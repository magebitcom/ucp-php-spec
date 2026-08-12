<?php
/**
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */
declare(strict_types=1);

namespace Magebit\UcpSpecGenerator;

/**
 * Builds the resolved spec/ tree from an upstream source/ checkout using the ucp-schema CLI.
 *
 * Upstream stopped committing spec/ in a8b185d and resolves on demand instead, so this reproduces
 * the layout the generator consumes: one file per operation variant, with $refs pointing at the
 * variant that matches the file's own direction.
 */
class SpecBuilder
{
    public const RESOLVER = 'ucp-schema';

    /** Annotations that mark a schema as having request/response variants. */
    private const ANNOTATIONS = ['ucp_request', 'ucp_response', 'ucp_shared_request'];

    /** Request operations emitted for an annotated schema that is not a shared request. */
    private const OPERATIONS = ['create', 'update', 'complete'];

    /** Source basenames that upstream renamed on the way into spec/. */
    private const SERVICE_RENAMES = [
        'openapi.json' => 'rest.openapi.json',
        'openrpc.json' => 'mcp.openrpc.json',
        'embedded.json' => 'embedded.openrpc.json',
    ];

    /**
     * OpenAPI and OpenRPC documents are copied through untouched. They are not JSON Schemas, and
     * upstream now ships them already resolved — their internal component refs name the variants
     * directly, so there is nothing left to rewrite.
     */
    private const DOCUMENTS = ['openapi.json', 'openrpc.json', 'rest.openapi.json', 'mcp.openrpc.json'];

    /** Top-level key order upstream's own writer produced; unlisted keys keep their order after these. */
    private const KEY_ORDER = [
        '$schema', '$id', 'name', 'version', 'title', 'description',
        'type', 'required', 'additionalProperties', 'properties',
    ];

    private const VARIANT_SUFFIX = '/(?:\.(?:create|update|complete)_req|_req|_resp)\.json$/';

    /** @var array<string, bool> Source-relative path => is a shared request */
    private array $annotated = [];

    /**
     * @param string $sourceDir Upstream source/ directory
     * @param string $outputDir Directory the spec tree is written to
     */
    public function __construct(
        private readonly string $sourceDir,
        private readonly string $outputDir
    ) {
    }

    /**
     * @return string
     * @throws \RuntimeException If the resolver is not installed
     */
    public function resolverVersion(): string
    {
        exec(escapeshellcmd(self::RESOLVER) . ' --version 2>/dev/null', $out, $status);

        if ($status !== 0 || $out === []) {
            throw new \RuntimeException(
                self::RESOLVER . ' is not on PATH. Install it with: cargo install ucp-schema --locked'
            );
        }

        return trim((string) preg_replace('/^\S+\s+/', '', $out[0]));
    }

    /**
     * Resolve every source schema into the output tree.
     *
     * @return string[] Output-relative paths written, sorted
     * @throws \RuntimeException If the resolver fails on any schema
     */
    public function build(): array
    {
        $this->annotated = [];
        $sources = $this->sourceSchemas();

        foreach ($sources as $relative) {
            $document = $this->readJson($this->sourceDir . '/' . $relative);

            if ($this->hasAnnotations($document)) {
                $this->annotated[$relative] = ($document['ucp_shared_request'] ?? null) === true;
            }
        }

        $written = [];

        foreach ($sources as $relative) {
            if ($this->isDocument($relative)) {
                $written[] = $this->copyDocument($relative);
                continue;
            }

            $written = array_merge($written, isset($this->annotated[$relative])
                ? $this->writeVariants($relative)
                : [$this->writePlain($relative)]);
        }

        sort($written, SORT_STRING);

        return $written;
    }

    /**
     * @return string[] Source-relative paths of every schema, sorted
     */
    private function sourceSchemas(): array
    {
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($this->sourceDir, \FilesystemIterator::SKIP_DOTS)
        );
        $paths = [];

        /** @var \SplFileInfo $file */
        foreach ($iterator as $file) {
            if ($file->isFile() && $file->getExtension() === 'json' && $file->getFilename()[0] !== '.') {
                $paths[] = ltrim(substr($file->getPathname(), strlen($this->sourceDir)), '/');
            }
        }

        sort($paths, SORT_STRING);

        return $paths;
    }

    /**
     * @param string $relative Source-relative schema path
     * @return string[] Output-relative paths written
     * @throws \RuntimeException
     */
    private function writeVariants(string $relative): array
    {
        $shared = $this->annotated[$relative];
        // A shared request has one file rather than one per operation, but it still resolves as
        // `create`, and references from it point at the other schemas' create variants.
        $operations = $shared ? ['create'] : self::OPERATIONS;
        $written = [];

        foreach ($operations as $operation) {
            $target = $this->variantPath($relative, 'request', $shared ? null : $operation);
            $document = $this->resolve($relative, 'request', $operation);
            // A request variant carries its own $id; responses keep the source identifier.
            $document['$id'] = $this->variantId((string) ($document['$id'] ?? ''), $target, $relative);
            $written[] = $this->write($target, $document, $relative, 'request', $operation, true, $shared);
        }

        $target = $this->variantPath($relative, 'response', null);
        $written[] = $this->write(
            $target,
            $this->resolve($relative, 'response', 'read'),
            $relative,
            'response',
            'read',
            true,
            $shared
        );

        return $written;
    }

    /**
     * @param string $id Identifier as the resolver emitted it
     * @param string $target Output-relative variant path
     * @param string $relative Source-relative schema path
     * @return string
     */
    private function variantId(string $id, string $target, string $relative): string
    {
        return $id === '' ? $id : str_replace(basename($relative), basename($target), $id);
    }

    /**
     * A schema with no annotations has no variants, but its $refs still have to point at ones that do.
     *
     * @param string $relative Source-relative schema path
     * @return string Output-relative path written
     * @throws \RuntimeException
     */
    private function writePlain(string $relative): string
    {
        $target = $this->renamedPath($relative);
        $document = $this->readJson($this->sourceDir . '/' . $relative);

        // Response direction so its refs point at response variants, but no title suffix: the file
        // is not itself a variant, and upstream left these titles alone.
        return $this->write($target, $document, $relative, 'response', null, false);
    }

    /**
     * @param string $relative Source-relative path
     * @return bool
     */
    private function isDocument(string $relative): bool
    {
        $base = basename($relative);

        return in_array($base, self::DOCUMENTS, true)
            || $base === 'embedded.openrpc.json'
            || ($base === 'embedded.json' && str_starts_with($relative, 'services/'));
    }

    /**
     * @param string $relative Source-relative path
     * @return string Output-relative path written
     * @throws \RuntimeException If the copy fails
     */
    private function copyDocument(string $relative): string
    {
        $target = $this->renamedPath($relative);
        $path = $this->outputDir . '/' . $target;

        if (!is_dir(dirname($path)) && !mkdir(dirname($path), 0o755, true) && !is_dir(dirname($path))) {
            throw new \RuntimeException('Cannot create directory: ' . dirname($path));
        }

        if (!copy($this->sourceDir . '/' . $relative, $path)) {
            throw new \RuntimeException("Cannot copy {$relative} to {$path}");
        }

        return $target;
    }

    /**
     * @param string $relative Source-relative schema path
     * @param string $direction "request" or "response"
     * @param string $operation Resolver operation
     * @return array Resolved schema
     * @throws \RuntimeException If the resolver exits non-zero
     */
    private function resolve(string $relative, string $direction, string $operation): array
    {
        $command = sprintf(
            'cd %s && %s resolve %s --%s --op %s 2>&1',
            escapeshellarg($this->sourceDir),
            escapeshellcmd(self::RESOLVER),
            escapeshellarg($relative),
            $direction,
            escapeshellarg($operation)
        );

        exec($command, $output, $status);
        $raw = implode("\n", $output);

        if ($status !== 0) {
            throw new \RuntimeException("Resolver failed for {$relative} ({$direction}/{$operation}): {$raw}");
        }

        $decoded = json_decode($raw, true);

        if (!is_array($decoded)) {
            throw new \RuntimeException("Resolver returned invalid JSON for {$relative}: " . substr($raw, 0, 200));
        }

        return $decoded;
    }

    /**
     * @param string $target Output-relative path
     * @param array $document Schema to write
     * @param string $relative Source-relative path the schema came from
     * @param string $direction Direction the file represents
     * @param string|null $operation Operation for request variants, null otherwise
     * @param bool $isVariant Whether the file is an operation variant and so carries a titled suffix
     * @param bool $shared Whether the schema is a shared request, which has no per-operation title
     * @return string The path written
     * @throws \RuntimeException If the file cannot be written
     */
    private function write(
        string $target,
        array $document,
        string $relative,
        string $direction,
        ?string $operation,
        bool $isVariant = true,
        bool $shared = false
    ): string {
        $document = $this->rewriteRefs($document, $relative, $direction, $operation);
        $document = $this->stripAnnotations($document);

        if ($isVariant) {
            $document = $this->applyTitle($document, $direction, $shared ? null : $operation);
        }

        $document = $this->orderKeys($document);

        $path = $this->outputDir . '/' . $target;

        if (!is_dir(dirname($path)) && !mkdir(dirname($path), 0o755, true) && !is_dir(dirname($path))) {
            throw new \RuntimeException('Cannot create directory: ' . dirname($path));
        }

        $json = json_encode($document, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        if ($json === false || file_put_contents($path, $json . "\n") === false) {
            throw new \RuntimeException("Cannot write {$path}");
        }

        return $target;
    }

    /**
     * @param string $relative Source-relative schema path
     * @param string $direction "request" or "response"
     * @param string|null $operation Operation for per-op requests, null for shared requests
     * @return string Output-relative variant path
     */
    private function variantPath(string $relative, string $direction, ?string $operation): string
    {
        $directory = dirname($relative) === '.' ? '' : dirname($relative) . '/';
        $stem = basename($relative, '.json');

        if ($direction === 'response') {
            return $directory . $stem . '_resp.json';
        }

        return $directory . $stem . ($operation === null ? '_req' : '.' . $operation . '_req') . '.json';
    }

    /**
     * @param string $relative Source-relative path
     * @return string Output-relative path, applying upstream's service-file renames
     */
    private function renamedPath(string $relative): string
    {
        $base = basename($relative);

        if (!str_starts_with($relative, 'services/') || !isset(self::SERVICE_RENAMES[$base])) {
            return $relative;
        }

        return dirname($relative) . '/' . self::SERVICE_RENAMES[$base];
    }

    /**
     * @param array $document Schema to walk
     * @param string $relative Source-relative path of the containing schema
     * @param string $direction Direction of the containing file
     * @param string|null $operation Operation of the containing file
     * @return array
     */
    private function rewriteRefs(array $document, string $relative, string $direction, ?string $operation): array
    {
        foreach ($document as $key => $value) {
            if ($key === '$ref' && is_string($value)) {
                $document[$key] = $this->rewriteRef($value, $relative, $direction, $operation);
            } elseif (is_array($value)) {
                $document[$key] = $this->rewriteRefs($value, $relative, $direction, $operation);
            }
        }

        return $document;
    }

    /**
     * Point a reference at the variant matching the referring file, but only when the target
     * actually has variants — an unannotated schema keeps its plain name.
     *
     * @param string $ref Reference as written in the source
     * @param string $relative Source-relative path of the referring schema
     * @param string $direction Direction of the referring file
     * @param string|null $operation Operation of the referring file
     * @return string
     */
    private function rewriteRef(string $ref, string $relative, string $direction, ?string $operation): string
    {
        [$path, $fragment] = array_pad(explode('#', $ref, 2), 2, null);

        if ($path === '' || $path === null || str_contains($path, '://')) {
            return $ref;
        }

        $target = $this->resolveRelative(dirname($relative), $path);

        if (!isset($this->annotated[$target])) {
            return $ref;
        }

        $variant = $this->variantPath(
            $target,
            $direction,
            $this->annotated[$target] ? null : $operation
        );
        // The reference stays relative to the referring file, so only the basename changes.
        $rewritten = (dirname($path) === '.' ? '' : dirname($path) . '/') . basename($variant);

        return $fragment === null ? $rewritten : $rewritten . '#' . $fragment;
    }

    /**
     * @param string $base Directory the reference is relative to
     * @param string $path Reference path
     * @return string Source-relative, normalised path
     */
    private function resolveRelative(string $base, string $path): string
    {
        $segments = [];

        foreach (explode('/', ($base === '.' ? '' : $base . '/') . $path) as $segment) {
            if ($segment === '' || $segment === '.') {
                continue;
            }
            $segment === '..' ? array_pop($segments) : $segments[] = $segment;
        }

        return implode('/', $segments);
    }

    /**
     * @param array $document Schema to clean
     * @return array
     */
    private function stripAnnotations(array $document): array
    {
        foreach ($document as $key => $value) {
            if (in_array($key, self::ANNOTATIONS, true)) {
                unset($document[$key]);
                continue;
            }
            // An empty required list is noise; upstream omitted the key entirely.
            if ($key === 'required' && $value === []) {
                unset($document[$key]);
                continue;
            }
            if (is_array($value)) {
                $document[$key] = $this->stripAnnotations($value);
            }
        }

        return $document;
    }

    /**
     * @param array $document Schema to title
     * @param string $direction Direction of the file
     * @param string|null $operation Operation of the file
     * @return array
     */
    private function applyTitle(array $document, string $direction, ?string $operation): array
    {
        $suffix = $direction === 'response'
            ? 'Response'
            : ($operation === null ? 'Request' : ucfirst($operation) . ' Request');

        // Nested $defs carry their own titles and are suffixed too, so a composed type reads as
        // "Buyer with Consent Response" rather than borrowing the base concept's name.
        foreach ($document as $key => $value) {
            if ($key === 'title' && is_string($value) && !str_ends_with($value, $suffix)) {
                $document[$key] = $value . ' ' . $suffix;
            } elseif (is_array($value)) {
                $document[$key] = $this->applyTitle($value, $direction, $operation);
            }
        }

        return $document;
    }

    /**
     * @param array $document Schema to order
     * @return array
     */
    private function orderKeys(array $document): array
    {
        $ordered = [];

        foreach (self::KEY_ORDER as $key) {
            if (array_key_exists($key, $document)) {
                $ordered[$key] = $document[$key];
            }
        }

        return $ordered + $document;
    }

    /**
     * @param array $document Schema to test
     * @return bool Whether any UCP annotation appears anywhere in the document
     */
    private function hasAnnotations(array $document): bool
    {
        foreach ($document as $key => $value) {
            if (in_array($key, self::ANNOTATIONS, true)) {
                return true;
            }
            if (is_array($value) && $this->hasAnnotations($value)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param string $path File to read
     * @return array Decoded document
     * @throws \RuntimeException If the file cannot be read or decoded
     */
    private function readJson(string $path): array
    {
        $raw = file_get_contents($path);

        if ($raw === false) {
            throw new \RuntimeException("Cannot read {$path}");
        }

        $decoded = json_decode($raw, true);

        if (!is_array($decoded)) {
            throw new \RuntimeException("Cannot decode {$path}: " . json_last_error_msg());
        }

        return $decoded;
    }
}
