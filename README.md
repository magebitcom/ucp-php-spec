# UCP PHP Specification

PHP interfaces for the Universal Commerce Protocol (UCP) specification. This package provides type-safe PHP interfaces automatically generated from the official UCP JSON Schema definitions.

## About UCP

The Universal Commerce Protocol (UCP) is a standardized protocol for commerce operations, providing a unified interface for shopping, checkout, payment, and fulfillment operations across different platforms and systems.

## What's Included

This package contains PHP interfaces for:

- **Shopping** - Cart, checkout, and order management
- **Payment** - Payment handlers, instruments, and credentials
- **Fulfillment** - Shipping, pickup, and delivery operations
- **Discovery** - Service discovery and capability negotiation

All interfaces are generated from the official UCP JSON Schema specifications located in the `spec/` directory.

## Installation

```bash
composer require magebitcom/ucp-php-spec
```

## Versioning

SemVer, with one extra rule: **a new UCP spec target always means a new MAJOR.**

| Part | Bumped when |
|---|---|
| **MAJOR** | New spec target, or a breaking change to emitted interfaces |
| **MINOR** | New interfaces or members, nothing existing changed |
| **PATCH** | Generator fix — same spec target, no new API |

So `^1.0` means "built against UCP `2026-04-08`", and a generator bug is fixed as a patch that
consumers can take without thinking.

| Library | UCP spec target |
|---|---|
| `1.x` | `2026-04-08` |

The target lives in `composer.json` → `extra.ucp.spec-target`, and is copied into
`spec.manifest.json` by the generator. The release workflow fails if they disagree, or if the
target moved without a major bump.

## Releasing

Releases are cut by the **Release** GitHub Action, manual dispatch only — there is no tag-push or
merge trigger, so releasing is always a deliberate act.

Run it from the Actions tab with:

- **version** — e.g. `1.2.0`, no leading `v`
- **spec_target** — optional; must match what is already committed. It is a confirmation, not a
  way to change the target. To move the target, commit the change to `composer.json` first.
- **prerelease** / **dry_run** — `dry_run` runs every gate and publishes nothing.

The job refuses to release unless: the version is valid semver and unused, `composer validate`
passes, unit tests pass, `composer check` confirms `generated/` matches what `spec/` produces, and
the two spec-target declarations agree with each other and with the major-bump rule.

## Usage

### Two Interface Variants

This package generates two sets of interfaces:

1. **`Api`** - Immutable interfaces with getters only (read-only)
2. **`MutableApi`** - Mutable interfaces with getters and setters (read-write)

### Using Immutable Interfaces (Api)

The `Api` namespace contains immutable interfaces with only getter methods:

```php
<?php

use Magebit\UcpSpec\Api\Schemas\Shopping\OrderInterface;
use Magebit\UcpSpec\Api\Schemas\Shopping\Types\OrderLineItemInterface;

// Implement the immutable interface
class MyOrder implements OrderInterface
{
    public function getId(): string
    {
        return $this->orderId;
    }

    public function getLineItems(): array
    {
        return $this->lineItems; // OrderLineItemInterface[]
    }

    // ... implement other getter methods
}
```

### Using Mutable Interfaces (MutableApi)

The `MutableApi` namespace contains mutable interfaces with both getters and setters:

```php
<?php

use Magebit\UcpSpec\MutableApi\Schemas\Shopping\OrderInterface;
use Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\OrderLineItemInterface;

// Implement the mutable interface
class MyMutableOrder implements OrderInterface
{
    private string $orderId;
    private array $lineItems;

    public function getId(): string
    {
        return $this->orderId;
    }

    public function setId(string $id): self
    {
        $this->orderId = $id;
        return $this;
    }

    public function getLineItems(): array
    {
        return $this->lineItems;
    }

    public function setLineItems(array $lineItems): self
    {
        $this->lineItems = $lineItems;
        return $this; // Fluent interface for method chaining
    }

    // ... implement other getter and setter methods
}
```

### Available Namespaces

**Immutable (Api):**
- `Magebit\UcpSpec\Api\Schemas\Shopping` - Shopping and order interfaces
- `Magebit\UcpSpec\Api\Schemas\Shopping\Types` - Common types
- `Magebit\UcpSpec\Api\Discovery` - Discovery profile interfaces
- `Magebit\UcpSpec\Api\Services` - Service definition interfaces

**Mutable (MutableApi):**
- `Magebit\UcpSpec\MutableApi\Schemas\Shopping` - Shopping and order interfaces
- `Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types` - Common types
- `Magebit\UcpSpec\MutableApi\Discovery` - Discovery profile interfaces
- `Magebit\UcpSpec\MutableApi\Services` - Service definition interfaces

### Type Safety

All interfaces include:
- ✅ Full PHP 8.2+ type hints
- ✅ Nullable types for optional properties
- ✅ Union types where applicable
- ✅ PHPDoc with array item types
- ✅ Fluent interface for setters (return `self`)

**Immutable Interface Example (Api):**

```php
interface OrderInterface
{
    /**
     * Unique order identifier.
     *
     * @return string
     */
    function getId(): string;

    /**
     * Immutable line items — source of truth for what was ordered.
     *
     * @return OrderLineItemInterface[]
     */
    function getLineItems(): array;

    /**
     * Append-only event log of money movements.
     *
     * @return AdjustmentInterface[]|null
     */
    function getAdjustments(): array|null;
}
```

**Mutable Interface Example (MutableApi):**

```php
interface OrderInterface
{
    function getId(): string;
    function setId(string $id): self;

    /**
     * @return OrderLineItemInterface[]
     */
    function getLineItems(): array;
    
    /**
     * @param OrderLineItemInterface[] $lineItems
     * @return self
     */
    function setLineItems(array $lineItems): self;

    /**
     * @return AdjustmentInterface[]|null
     */
    function getAdjustments(): array|null;
    
    /**
     * @param AdjustmentInterface[]|null $adjustments
     * @return self
     */
    function setAdjustments(?array $adjustments): self;
}
```

## Regenerating Interfaces

If you need to regenerate the interfaces from the JSON Schema files (e.g., after updating the spec):

### Prerequisites

- PHP 8.2 or higher
- Composer dependencies installed

### Generate Command

```bash
# Generate interfaces from spec files
php generate.php

# Clean and regenerate all interfaces
php generate.php --clean

# CI drift gate: regenerate into a temp directory and fail if the committed output differs
php generate.php --check
```

The generator automatically creates both `Api` (immutable) and `MutableApi` (mutable) namespaces in a single run.

### Guarantees and exit codes

`generate.php` exits non-zero on any of the following, so it is safe to use in CI:

- a schema file fails to load, resolve or compose;
- **integrity**: a type is referenced by the emitted code but never emitted itself. This is a hard gate — the missing interface would otherwise only surface as a fatal error at class-link time in a consuming project;
- `--check` only: the freshly generated output differs from what is committed under `generated/`, or `spec.manifest.json` is out of date.

Output is deterministic: input schema files are sorted before generation, so two runs on the same `spec/` are byte-identical regardless of filesystem iteration order.

### Name collisions

Several schema files sanitize to the same interface name in the same namespace — for example
`shopping/discount.create_req.json`, `shopping/discount.update_req.json` and `shopping/discount_resp.json`
all contribute `Magebit\UcpSpec\Api\Schemas\Shopping\DiscountCheckoutInterface`. The generator reports every
collision at the end of a run and the last source in sorted order wins (in practice the `_resp` variant).
These names are a known limitation of the current naming scheme, not a generation error, so they are warnings
rather than failures.

## Spec Provenance (`spec.manifest.json`)

Every run writes `spec.manifest.json` next to `generated/`, recording the generator version and a SHA-256 for
each input schema file.

This package targets **`2026-04-08`**, resolved from `source/` at
`a2d8bf0b8f5a6fc790f677899c2c7da0684fe33d` (tag `v2026-04-08`). `release/2026-04-08` kept receiving
cherry-picks until at least 2026-05-22, so the commit is pinned and the dated name is not trusted.

Upstream stopped committing a pre-generated `spec/` directory in `a8b185d` (2026-01-28), replacing it with
on-demand resolution through the `ucp-schema` CLI. `bin/fetch-spec` reproduces the tree this generator
consumes — see [Refetching the spec](#refetching-the-spec).

An earlier snapshot in this repository declared `2026-04-08` while actually containing `2026-01-23`. It was
identified by comparing the git blob hash of all 91 files against candidate revisions — `843db28` matched
84/91, `8483a7f` 89/91, and tag `v2026-01-23` (`dcf7eac71fc370dcc8768fcdbc5aa737037cca05`) matched 91/91 with
nothing extra on either side. Provenance is now recorded in `composer.json` and must be updated there
whenever `spec/` is refetched; never guess it.

### Refetching the spec

```bash
cargo install ucp-schema --locked          # the resolver upstream itself uses
git clone https://github.com/Universal-Commerce-Protocol/ucp /tmp/ucp
git -C /tmp/ucp checkout <pinned commit>
php bin/fetch-spec --source=/tmp/ucp/source
```

`bin/fetch-spec` emits one file per operation variant — `X.create_req.json`, `X.update_req.json`,
`X.complete_req.json` and `X_resp.json` for an annotated schema, or `X_req.json` and `X_resp.json` when the
schema is a shared request — rewriting each `$ref` to the variant matching the file's own direction.
OpenAPI and OpenRPC documents are copied through untouched: upstream now ships them already resolved.

The tool was validated against `v2026-01-23`, whose `spec/` tree is committed upstream: resolving that
release's `source/` reproduces all 91 committed paths, and the generated PHP is identical except for two AP2
types where the current resolver correctly marks `ap2` and `checkout_mandate` required at the `complete`
operation.

## Tests

```bash
composer install
vendor/bin/phpunit
```

The suite covers generator behaviour and the shape of the emitted code — the `$ref` alias resolution, the
dedup key, the integrity gate and output determinism. It does not test the generated interfaces themselves.

## Namespace Mapping

The generator preserves directory structure in namespaces and creates both immutable and mutable variants:

| Spec File | Immutable Interface (Api) | Mutable Interface (MutableApi) |
|-----------|---------------------------|--------------------------------|
| `spec/schemas/shopping/order.json` | `Magebit\UcpSpec\Api\Schemas\Shopping\OrderInterface` | `Magebit\UcpSpec\MutableApi\Schemas\Shopping\OrderInterface` |
| `spec/schemas/shopping/types/postal_address.json` | `Magebit\UcpSpec\Api\Schemas\Shopping\Types\PostalAddressInterface` | `Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\PostalAddressInterface` |
| `spec/discovery/profile_schema.json` | `Magebit\UcpSpec\Api\Discovery\UCPDiscoveryProfileInterface` | `Magebit\UcpSpec\MutableApi\Discovery\UCPDiscoveryProfileInterface` |

## Type Mapping

JSON Schema types are mapped to PHP as follows:

| JSON Schema Type | PHP Type | PHPDoc Example |
|-----------------|----------|----------------|
| `string` | `string` | `@return string` |
| `integer` | `int` | `@return int` |
| `number` | `float` | `@return float` |
| `boolean` | `bool` | `@return bool` |
| `array` | `array` | `@return TypeInterface[]` |
| `object` | Interface | `@return InterfaceName` |
| `null` | `null` | `@return TypeInterface\|null` |
| `oneOf`/`anyOf` | Union | `@return string\|int` |

## Contributing

When updating the UCP specification:

1. Re-resolve `spec/` from the upstream `source/` tree at a pinned commit
2. Update `extra.ucp.spec-target` and `extra.ucp.upstream` in `composer.json` — the manifest reads its
   provenance from there, so these are the only place the values are written
3. Run `php generate.php --clean` to regenerate interfaces
4. Run `composer dump-autoload` to update autoloader
5. Run `vendor/bin/phpunit` and `php generate.php --check`
6. Commit the spec files, the generated interfaces and `spec.manifest.json`

## License

MIT License - see [LICENSE.md](LICENSE.md) for details.

## Links

- **UCP Specification**: [https://ucp.dev](https://ucp.dev)
- **JSON Schema**: [https://json-schema.org](https://json-schema.org)
- **Generator**: Built with [nette/php-generator](https://github.com/nette/php-generator)

---

![Magebit](https://github.com/user-attachments/assets/cdc904ce-e839-40a0-a86f-792f7ab7961f)

Magebit - Full-service e-commerce agency
[magebit.com](https://magebit.com)
