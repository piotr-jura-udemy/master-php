<?php

namespace Core\Middlewares;

use Core\Services\CSRF as CSRFService;
use Core\Middleware;
use Core\Router;

class CSRF implements Middleware {
  public function handle(callable $next) {
    if (!CSRFService::verify()) {
      Router::pageExpired();
    }
    return $next();
  }
}