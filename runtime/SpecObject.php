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
     * A required list is absent rather than empty far more often than it is genuinely missing,
     * so it reads as `[]` instead of tripping the return type.
     *
     * @param string $key Spec field name
     * @return array<mixed>
     */
    public function getArray(string $key): array
    {
        $value = $this->data[$key] ?? null;

        return is_array($value) ? $value : [];
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
}
