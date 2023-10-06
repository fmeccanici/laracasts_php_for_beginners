<?php

namespace Core;

use Core\Middleware\Auth;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;

class Router
{
    protected $routes = [];

    public function add($method, $uri, $controller, $middleware = null): Router
    {
        $this->routes[] = compact('method', 'uri', 'controller', 'middleware');

        return $this;
    }

    public function get($uri, $controller): Router
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller): Router
    {
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller): Router
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller): Router
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller): Router
    {
        return $this->add('PUT', $uri, $controller);
    }

    public function only($key): Router
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route)
        {
            if ($route['uri'] === $uri && strtoupper($route['method']) === $method)
            {
                Middleware::resolve($route['middleware']);

                return require base_path($route['controller']);
            }
        }

        $this->abort();
    }

    protected function abort($code = 404)
    {
        http_response_code($code);

        require base_path("views/{$code}.php");

        die();
    }

}


