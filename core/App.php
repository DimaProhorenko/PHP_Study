<?php

class App
{
    private static $container;

    public static function set_container($container)
    {
        static::$container = $container;
    }

    public static function container()
    {
        return static::$container;
    }

    public static function resolve($key)
    {
        return static::$container->resolve($key);
    }
}
