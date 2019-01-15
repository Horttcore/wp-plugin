# WorPress Plugin Wrapper

## Usage

* Create a plugin container
* Add a service
* Boot the plugin

## Example
```php
<?php
PluginFactory::create()
    ->addService(Service::class)
    ->boot();
```