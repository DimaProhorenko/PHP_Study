<?php

class Container
{
    private $bindings = [];

    public function bind($key, $builder)
    {
        $this->bindings[$key] = $builder;
    }


    public function resolve($key)
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new Error("Could'nt find a binding {$key}");
        }

        $resolver = $this->bindings[$key];
        var_dump($resolver);
        return call_user_func($resolver);
    }
}
