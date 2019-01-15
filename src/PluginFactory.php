<?php
namespace Horttcore\Plugin;

use Horttcore\Plugin\Plugin;

/**
 * Class PluginFactory
 *
 * @since   1.0.0
 *
 * @package Horttcore\Plugin
 * @author  Ralf Hortt <me@horttcore.de>
 */
class PluginFactory
{


    /**
     * Create and return an instance of the plugin.
     * This always returns a shared instance.
     *
     * @since 1.0.0
     * @return Plugin Plugin instance.
     */
    public static function create()
    {
        static $plugin = null;
        if ( null === $plugin ) {
            $plugin = new Plugin();
        }
        return $plugin;
	}
	

}
