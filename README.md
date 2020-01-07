# WorPress Plugin Wrapper

## Usage

- Create a plugin container
- Add a service
- Boot the plugin

## Installation

`$ composer require ralfhortt/wp-plugin`

## Example

```php
<?php
use RalfHortt\Plugin\PluginFactory;

PluginFactory::create()
    ->addService(Service::class) // Simple service
    ->addService(anotherService::class, 'Foo', ['bar']) // Service that passes args to his register method
    ->boot();
```

## Changelog

### v2.0.0

- Add: Pass arguments to service register function
- Change: Namespace changed to RalfHortt\Plugin
- Change: Move translation to its own service

### v1.0.1

- Changed: `PluginFactory` returns a new `Plugin` object instead of a shared instance

### v1.0.0

- Initial release
