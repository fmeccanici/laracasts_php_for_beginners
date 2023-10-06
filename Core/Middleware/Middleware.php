<?php

namespace Core\Middleware;

class Middleware
{
    const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class
    ];

    public static function resolve($key)
    {
        if (! $key)
        {
            return;
        }

        $middleware = Middleware::MAP[$key];

        if (!$middleware)
        {
            throw new \Exception("No middleware found for key: {$key}.");
        }

        (new $middleware)->handle();
    }
}