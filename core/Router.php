<?php
require_once base_path('core/middleware/Middleware.php');
require_once base_path('core/middleware/Auth.php');
require_once base_path('core/middleware/Guest.php');
class Router
{
    private $routes = [];

    private function add($uri, $controller_path, $method)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller_path,
            'method' => $method,
            'middleware' => null,
        ];
        return $this;
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                if ($route['middleware']) {
                    Middleware::resolve($route['middleware']);
                }
                return require base_path("http/controllers/{$route['controller']}");
            }
        }

        abort();
    }


    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

    public function get($uri, $controller_path)
    {
        return $this->add($uri, $controller_path, 'GET');
    }

    public function post($uri, $controller_path)
    {
        return $this->add($uri, $controller_path, 'POST');
    }

    public function delete($uri, $controller_path)
    {
        return $this->add($uri, $controller_path, 'DELETE');
    }

    public function push($uri, $controller_path)
    {
        return $this->add($uri, $controller_path, 'PUSH');
    }

    public function patch($uri, $controller_path)
    {
        return $this->add($uri, $controller_path, 'PATCH');
    }
}
