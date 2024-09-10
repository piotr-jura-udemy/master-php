<?php

namespace App\Middlewares;

use App\Services\CSRF as ServicesCSRF;
use Core\Middleware;
use Core\Router;

class CSRF implements Middleware {
  public function handle(callable $next) {
    if (!ServicesCSRF::verify()) {
      Router::pageExpired();
    }
    return $next();
  }
}