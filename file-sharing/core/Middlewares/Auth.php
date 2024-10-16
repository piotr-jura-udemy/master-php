<?php

namespace Core\Middlewares;

use Core\Services\Auth as AuthService;
use Core\Middleware;
use Core\Router;

class Auth implements Middleware {
  public function handle(callable $next) {
    $user = AuthService::user();
    if (!$user) {
      Router::unauthorized();
    }
    return $next();
  }
}