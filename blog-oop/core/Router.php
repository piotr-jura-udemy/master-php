<?php

namespace Core;

class Router {
  protected array $routes = [];

  public function add(string $method, string $uri, string $controller): void {
    $this->routes[] = [
      'method' => $method,
      'uri' => $uri,
      'controller' => $controller
    ];
  }

  public static function notFound(): void {
    http_response_code(404);
    echo View::render('errors/404');
    exit;
  }

  public function dispatch(string $uri, string $method): string {
    $route = $this->findRoute($uri, $method);

    if (!$route) {
      return static::notFound();
    }
    // PostController@index
    // PostController@show
    [$controller, $action] = explode('@', $route['controller']);
    return $this->callAction($controller, $action, $route['params']);
  }

  protected function findRoute(string $uri, string $method): ?array {
    foreach ($this->routes as $route) {
      $params = $this->matchRoute($route['uri'], $uri);
      if ($params !== null && $route['method'] === $method) {
        return [...$route, 'params' => $params];
      }
    }

    return null;
  }

  protected function matchRoute(string $routeUri, string $requestUri): ?array {
    $routeSegments = explode('/', trim($routeUri, '/'));
    $requestSegments = explode('/', trim($requestUri, '/'));

    if (count($routeSegments) !== count($requestSegments)) {
      return null;
    }

    $params = [];

    foreach ($routeSegments as $index => $routeSegment) {
      if (str_starts_with($routeSegment, '{') && str_ends_with($routeSegment, '}')) {
        $params[trim($routeSegment, '{}')] = $requestSegments[$index];
      } elseif($routeSegment !== $requestSegments[$index]) {
        return null;
      }
    }

    return $params;
  }

  protected function callAction(string $controller, string $action, array $params): string {
    $controllerClass = "App\\Controllers\\$controller";
    return (new $controllerClass)->$action(...$params);
  }
}