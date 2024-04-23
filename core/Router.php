<?php

class Router
{
    private $routes = [];

    private function create_route($uri, $controller_path, $method)
    {
        return [
            'uri' => $uri,
            'controller' => $controller_path,
            'method' => $method
        ];
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require base_path($route['controller']);
            }
        }

        abort();
    }

    public function get($uri, $controller_path)
    {
        $this->routes[] = $this->create_route($uri, $controller_path, 'GET');
    }

    public function post($uri, $controller_path)
    {
        $this->routes[] = $this->create_route($uri, $controller_path, 'POST');
    }

    public function delete($uri, $controller_path)
    {
        $this->routes[] = $this->create_route($uri, $controller_path, 'DELETE');
    }

    public function push($uri, $controller_path)
    {
        $this->routes[] = $this->create_route($uri, $controller_path, 'PUSH');
    }

    public function patch($uri, $controller_path)
    {
        $this->routes[] = $this->create_route($uri, $controller_path, 'PATCH');
    }
}
