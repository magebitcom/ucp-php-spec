<?php
/**
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */
declare(strict_types=1);

namespace Magebit\UcpSpec\Runtime;

/**
 * Base for the generated spec DTOs: an ordered key-value store that serialises back to spec JSON.
 *
 * The typed accessors exist so a generated getter can narrow `mixed` to its declared type in one
 * place, rather than every DTO restating the same check.
 */
abstract class SpecObject implements \JsonSerializable
{
    /**
     * Keys the spec types as JSON objects, so that an empty one encodes as `{}` rather than `[]`.
     *
     * @var string[]
     */
    protected array $jsonObjectKeys = [];

    /**
     * @var array<string, mixed>
     */
    private array $data = [];

    /**
     * @param array<string, mixed> $data Initial values, keyed by spec field name
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /**
     * @param string $key Spec field name
     * @return mixed
     */
    public function get(string $key): mixed
    {
        return $this->data[$key] ?? null;
    }

    /**
     * @param string $key Spec field name
     * @param mixed $value Value to store
     * @return static
     */
    public function set(string $key, mixed $value): static
    {
        $this->data[$key] = $value;

        return $this;
    }

    /**
     * @param string $key Spec field name
     * @return bool
     */
    public function has(string $key): bool
    {
        return array_key_exists($key, $this->data);
    }

    /**
     * @param string $key Spec field name
     * @return static
     */
    public function unset(string $key): static
    {
        unset($this->data[$key]);

        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return $this->data;
    }

    /**
     * Absent and null are the same thing in both specs, so nulls are dropped rather than emitted.
     *
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = array_filter($this->data, static fn ($value): bool => $value !== null);

        foreach ($this->jsonObjectKeys as $key) {
            if (($data[$key] ?? null) === []) {
                $data[$key] = new \stdClass();
            }
        }

        return $data;
    }

    /**
     * @param string $key Spec field name
     * @return string
     * @throws \UnexpectedValueException If the field is absent or of another type
     */
    protected function requireString(string $key): string
    {
        $value = $this->get($key);

        return is_string($value) ? $value : throw $this->unexpected($key, 'string', $value);
    }

    /**
     * @param string $key Spec field name
     * @return string|null
     */
    protected function stringOrNull(string $key): ?string
    {
        $value = $this->get($key);

        return is_string($value) ? $value : null;
    }

    /**
     * @param string $key Spec field name
     * @return int
     * @throws \UnexpectedValueException If the field is absent or of another type
     */
    protected function requireInt(string $key): int
    {
        $value = $this->get($key);

        return is_int($value) ? $value : throw $this->unexpected($key, 'int', $value);
    }

    /**
     * @param string $key Spec field name
     * @return int|null
     */
    protected function intOrNull(string $key): ?int
    {
        $value = $this->get($key);

        return is_int($value) ? $value : null;
    }

    /**
     * JSON numbers arrive as int when they have no fractional part, so both are accepted.
     *
     * @param string $key Spec field name
     * @return float
     * @throws \UnexpectedValueException If the field is absent or of another type
     */
    protected function requireFloat(string $key): float
    {
        $value = $this->get($key);

        return is_int($value) || is_float($value)
            ? (float)$value
            : throw $this->unexpected($key, 'float', $value);
    }

    /**
     * @param string $key Spec field name
     * @return float|null
     */
    protected function floatOrNull(string $key): ?float
    {
        $value = $this->get($key);

        return is_int($value) || is_float($value) ? (float)$value : null;
    }

    /**
     * @param string $key Spec field name
     * @return bool
     * @throws \UnexpectedValueException If the field is absent or of another type
     */
    protected function requireBool(string $key): bool
    {
        $value = $this->get($key);

        return is_bool($value) ? $value : throw $this->unexpected($key, 'bool', $value);
    }

    /**
     * @param string $key Spec field name
     * @return bool|null
     */
    protected function boolOrNull(string $key): ?bool
    {
        $value = $this->get($key);

        return is_bool($value) ? $value : null;
    }

    /**
     * A required list is absent rather than empty far more often than it is genuinely missing,
     * so it reads as `[]` instead of raising.
     *
     * @param string $key Spec field name
     * @return array<mixed>
     */
    protected function getArray(string $key): array
    {
        $value = $this->get($key);

        return is_array($value) ? $value : [];
    }

    /**
     * @param string $key Spec field name
     * @return array<mixed>|null
     */
    protected function arrayOrNull(string $key): ?array
    {
        $value = $this->get($key);

        return is_array($value) ? $value : null;
    }

    /**
     * @template T of object
     * @param string $key Spec field name
     * @param class-string<T> $type Expected type
     * @return T
     * @throws \UnexpectedValueException If the field is absent or of another type
     */
    protected function requireInstance(string $key, string $type): object
    {
        $value = $this->get($key);

        return $value instanceof $type ? $value : throw $this->unexpected($key, $type, $value);
    }

    /**
     * @template T of object
     * @param string $key Spec field name
     * @param class-string<T> $type Expected type
     * @return T|null
     */
    protected function instanceOrNull(string $key, string $type): ?object
    {
        $value = $this->get($key);

        return $value instanceof $type ? $value : null;
    }

    /**
     * @template T of object
     * @param string $key Spec field name
     * @param class-string<T> $type Expected element type
     * @return list<T>
     * @throws \UnexpectedValueException If any element is of another type
     */
    protected function instanceList(string $key, string $type): array
    {
        $values = [];

        foreach ($this->getArray($key) as $index => $value) {
            $values[] = $value instanceof $type
                ? $value
                : throw $this->unexpected($key . '[' . $index . ']', $type, $value);
        }

        return $values;
    }

    /**
     * @template T of object
     * @param string $key Spec field name
     * @param class-string<T> $type Expected element type
     * @return list<T>|null
     */
    protected function instanceListOrNull(string $key, string $type): ?array
    {
        return $this->get($key) === null ? null : $this->instanceList($key, $type);
    }

    /**
     * @param string $key Spec field name
     * @param string $expected Expected type name
     * @param mixed $value Value that was found
     * @return \UnexpectedValueException
     */
    private function unexpected(string $key, string $expected, mixed $value): \UnexpectedValueException
    {
        return new \UnexpectedValueException(sprintf(
            '%s::%s expects %s, got %s',
            static::class,
            $key,
            $expected,
            get_debug_type($value)
        ));
    }
}
