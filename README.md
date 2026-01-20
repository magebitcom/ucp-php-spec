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
- ✅ Full PHP 8.1+ type hints
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
     * @param OrderLineItemInterface[] $line_items
     * @return self
     */
    function setLineItems(array $line_items): self;

    /**
     * @return AdjustmentInterface[]|null
     */
    function getAdjustments(): array|null;
    
    /**
     * @param AdjustmentInterface[]|null $adjustments
     * @return self
     */
    function setAdjustments(array|null $adjustments): self;
}
```

## Regenerating Interfaces

If you need to regenerate the interfaces from the JSON Schema files (e.g., after updating the spec):

### Prerequisites

- PHP 8.1 or higher
- Composer dependencies installed

### Generate Command

```bash
# Generate interfaces from spec files
php generate.php

# Clean and regenerate all interfaces
php generate.php --clean
```

The generator automatically creates both `Api` (immutable) and `MutableApi` (mutable) namespaces in a single run.

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

1. Update JSON Schema files in `spec/`
2. Run `php generate.php --clean` to regenerate interfaces
3. Run `composer dump-autoload` to update autoloader
4. Test the generated interfaces
5. Commit both spec files and generated interfaces

## License

MIT License - see [LICENSE.md](LICENSE.md) for details.

## Links

- **UCP Specification**: [https://ucp.dev](https://ucp.dev)
- **JSON Schema**: [https://json-schema.org](https://json-schema.org)
- **Generator**: Built with [nette/php-generator](https://github.com/nette/php-generator)

---

![magebit (1)](https://github.com/user-attachments/assets/cdc904ce-e839-40a0-a86f-792f7ab7961f)

*Have questions or need help? Contact us at info@magebit.com*

[https://magebit.com](https://magebit.com)