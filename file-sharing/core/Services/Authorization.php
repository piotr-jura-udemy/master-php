<?php

namespace Core\Services;

use Core\Router;

abstract class Authorization {
  public static function verify(
    string $action, mixed $resource = null
  ): void {
    if (!static::check($action, $resource)) {
      Router::forbidden();
    }
  }

  public static function check(
    string $action, mixed $resource = null
  ): bool {
    $user = Auth::user();
    if (!$user) {
      return false;
    }

    if ('superadmin' === $user->role) {
      return true;
    }

    return match($action) {
      default => false
    };
  }
}