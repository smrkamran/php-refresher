<?php

declare(strict_types=1);

class Router
{
    private array $routes = [];
    public function add(string $path, Closure $handler): void
    {
        $this->routes[$path] = $handler;
    }

    public function dispatch(string $path): void
    {
        // if (array_key_exists($path, $this->routes)) {
        //     $handler = $this->routes[$path];

        //     call_user_func($handler);
        // } else {
        //     echo "Page not found";
        // }
        foreach ($this->routes as $route => $handler) {
            $pattern = preg_replace("#\{\w+\}#", "([^\/]+)", $route); // /products/{id}  -> /products/[^\/]+

            if (preg_match("#^$pattern$#", $path, $matches)) {
                echo $pattern."<br>";
                echo $path."<br>";
                echo $matches."<br>";
                array_shift($matches);
                call_user_func_array($handler, $matches);
                return;
            }
        }
        echo "Page not found";
    }
}