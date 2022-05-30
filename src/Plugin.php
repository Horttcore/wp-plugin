<?php
namespace RalfHortt\Plugin;

/**
 * Class Plugin.
 *
 * Main plugin controller class that hooks the plugin's functionality into the WordPress request lifecycle.
 *
 * @since   1.0.0
 * @package RalfHortt\Plugin
 * @author  Ralf Hortt <me@horttcore.de>
 */
class Plugin
{

    /**
     * Services
     *
     * @since 1.0.0
     * @var array $services Registered services
     */
    protected $services = [];

    /**
     * Register the plugin with the WordPress system.
     *
     * @since 1.0.0
     * @return Plugin
     */
    public function boot()
    {
        $this->registerServices();

        return $this;
    }


    /**
     * Add service
     *
     * @param strong $class Class name
     * @return Plugin
     **/
    public function addService(string $class)
    {
        $args = func_get_args();
        array_shift($args);

        $this->services[] = [
            'hook' => 'plugins_loaded',
            'class' => $class,
            'args' => $args
        ];

        return $this;
    }


    /**
     * Add service
     *
     * @param strong $class Class name
     * @return Plugin
     **/
    public function addServiceHook()
    {
        $args = func_get_args();
        $hook = array_shift($args);
        $class = array_shift($args);

        $this->services[] = [
            'hook' => $hook,
            'class' => $class,
            'args' => $args
        ];

        return $this;
    }


    /**
     * Get the list of services to register.
     *
     * @since 1.0.0
     *
     * @return array<string> Array of fully qualified class names.
     */
    private function getServices()
    {
        return $this->services;
    }


    /**
     * Register the individual services of this plugin.
     *
     * @since 1.0.0
     * @throws Exception
     */
    public function registerServices()
    {
        $services = $this->getServices();
        
        array_walk($services, function ($service) {
            \add_action($service['hook'], function() use ($service) {
                if (!class_exists($service['class'])) {
                    throw new \Exception(sprintf('Service is not registerable: Class %s does not exist', $service['class']));
                }
    
                if (!method_exists($service['class'], 'register')) {
                    throw new \Exception(sprintf('Service is not registerable: Method `register` does not exist in %s', $service['class']));
                }

                (new $service['class'](...$service['args']))->register();
            });
        });
    }
}
