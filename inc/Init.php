<?php

/**
 * @package  AlecadddPlugin
 */

namespace Inc;


use Inc\Base\Enqueue;
use Inc\Base\SettingsLinks;
use Inc\Pages\Admin;

final class Init
{
    /**
     * Store All the classes inside array
     * @return array
     */
    public static function get_services()
    {
        return array(
            Admin::class,
            Enqueue::class,
            SettingsLinks::class,

        );
    }

    /**
     * Return instance of class
     * @param class $class
     * @return class instance
     */
    public static function  register_services()
    {
        foreach (self::get_services() as $class) {
            $service = self::instantiate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }
    private static function instantiate($class)
    {
        return new $class;
    }
}
