# WorPress Plugin Wrapper

## Usage

* Create a plugin container
* Add a service
* Boot the plugin

## Example

### Building a service
```php
<?php
use Horttcore/Plugin/Interfaces/ServiceInterface;

class Service implements ServiceInterface
{
    function register(){
        add_action('wp_body_open', function(){
            echo 'Hello World';
        });
    }
}
```

### Attaching a service
```php
<?php
PluginFactory::create()
    ->addTranslation($textdomain, $pathToDirectory)
    ->addService(Service::class)
    ->boot();
```

## Changelog

### v2.0.0

* Changed: Service MUST implement the interface `ServiceInterface`

### v1.0.1

* Changed: `PluginFactory` returns a new `Plugin` object instead of a shared instance

### v1.0.0

* Initial release