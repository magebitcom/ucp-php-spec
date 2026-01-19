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

### Using the Interfaces

The generated interfaces are available under the `Magebit\UcpSpec` namespace:

```php
<?php

use Magebit\UcpSpec\Schemas\Shopping\Order;
use Magebit\UcpSpec\Schemas\Shopping\Types\OrderLineItem;
use Magebit\UcpSpec\Schemas\Shopping\CheckoutResponse;

// Implement the interfaces in your application
class MyOrder implements Order
{
    public function getId(): string
    {
        return $this->orderId;
    }

    public function getLineItems(): array
    {
        return $this->lineItems; // OrderLineItem[]
    }

    // ... implement other methods
}
```

### Available Namespaces

- `Magebit\UcpSpec\Schemas\Shopping` - Shopping and order interfaces
- `Magebit\UcpSpec\Schemas\Shopping\Types` - Common types (addresses, items, etc.)
- `Magebit\UcpSpec\Discovery` - Discovery profile interfaces
- `Magebit\UcpSpec\Services` - Service definition interfaces

### Type Safety

All interfaces include:
- ✅ Full PHP 8.1+ type hints
- ✅ Nullable types for optional properties
- ✅ Union types where applicable
- ✅ PHPDoc with array item types

Example:

```php
interface Order
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
     * @return OrderLineItem[]
     */
    function getLineItems(): array;

    /**
     * Append-only event log of money movements.
     *
     * @return Adjustment[]|null
     */
    function getAdjustments(): array|null;
}
```

## Specification Structure

The UCP specification is organized as follows:

```
spec/
├── schemas/              # Core schema definitions
│   ├── shopping/        # Shopping domain
│   │   ├── order.json
│   │   ├── checkout_resp.json
│   │   └── types/       # Reusable types
│   └── ucp.json         # Protocol metadata
├── discovery/           # Discovery profiles
└── services/            # Service definitions
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

## Namespace Mapping

The generator preserves directory structure in namespaces:

| Spec File | Generated Interface |
|-----------|-------------------|
| `spec/schemas/shopping/order.json` | `Magebit\UcpSpec\Schemas\Shopping\Order` |
| `spec/schemas/shopping/types/postal_address.json` | `Magebit\UcpSpec\Schemas\Shopping\Types\PostalAddress` |
| `spec/discovery/profile_schema.json` | `Magebit\UcpSpec\Discovery\UCPDiscoveryProfile` |

## Type Mapping

JSON Schema types are mapped to PHP as follows:

| JSON Schema Type | PHP Type | PHPDoc Example |
|-----------------|----------|----------------|
| `string` | `string` | `@return string` |
| `integer` | `int` | `@return int` |
| `number` | `float` | `@return float` |
| `boolean` | `bool` | `@return bool` |
| `array` | `array` | `@return Type[]` |
| `object` | Interface | `@return InterfaceName` |
| `null` | `null` | `@return Type\|null` |
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

## Author

**Magebit**
- Website: [https://magebit.com](https://magebit.com)
- Email: info@magebit.com
