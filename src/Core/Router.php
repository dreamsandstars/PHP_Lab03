<?php

declare(strict_types=1);

namespace App\Core;

use App\Support\Response;

class Router
{
    private array $routes = [];

    public function get(string $path, array $handler): void
    {
        $this->routes['GET'][$this->normalizePath($path)] = $handler;
    }

    public function post(string $path, array $handler): void
    {
        $this->routes['POST'][$this->normalizePath($path)] = $handler;
    }

    public function dispatch(string $method, string $path): void
    {
        $method = strtoupper($method);
        $path = $this->normalizePath($path);

        // 1. Try direct match first
        if (isset($this->routes[$method][$path])) {
            $this->callHandler($this->routes[$method][$path]);
            return;
        }

        // 2. Try regex match for dynamic routes (e.g. /books/{isbn})
        if (isset($this->routes[$method])) {
            foreach ($this->routes[$method] as $registeredPath => $handler) {
                $pattern = '#^' . preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>[^/]+)', $registeredPath) . '$#';
                if (preg_match($pattern, $path, $matches)) {
                    $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                    $this->callHandler($handler, $params);
                    return;
                }
            }
        }

        $allowedMethods = $this->getAllowedMethodsForPath($path);

        if (!empty($allowedMethods)) {
            Response::methodNotAllowed($allowedMethods);
        }

        Response::notFound('404 Not Found');
    }

    private function callHandler(array $handler, array $params = []): void
    {
        [$controllerClass, $action] = $handler;

        if (!class_exists($controllerClass)) {
            Response::notFound('Controller not found');
        }

        $controller = new $controllerClass();

        if (!method_exists($controller, $action)) {
            Response::notFound('Action not found');
        }

        $controller->$action(...$params);
    }

    private function getAllowedMethodsForPath(string $path): array
    {
        $allowedMethods = [];

        foreach ($this->routes as $method => $paths) {
            foreach ($paths as $registeredPath => $handler) {
                if ($registeredPath === $path) {
                    $allowedMethods[] = $method;
                    continue;
                }

                $pattern = '#^' . preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>[^/]+)', $registeredPath) . '$#';
                if (preg_match($pattern, $path)) {
                    $allowedMethods[] = $method;
                }
            }
        }

        return array_unique($allowedMethods);
    }

    private function normalizePath(string $path): string
    {
        $path = parse_url($path, PHP_URL_PATH) ?: '/';

        if ($path !== '/') {
            $path = rtrim($path, '/');
        }

        return $path;
    }
}
