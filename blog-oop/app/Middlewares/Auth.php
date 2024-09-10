<?php

namespace App\Middlewares;

use App\Services\Auth as ServicesAuth;
use Core\Middleware;
use Core\Router;

class Auth implements Middleware {
  public function handle(callable $next) {
    $user = ServicesAuth::user();
    if (!$user) {
      Router::unauthorized();
    }
    return $next();
  }
}