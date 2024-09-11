<?php

namespace App\Services;

use App\Models\Post;
use Core\Router;

class Authorization {
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
      'dashboard' => in_array(
        $user->role, ['admin', 'superadmin']
      ),
      'edit_post', 'delete_post' => $resource instanceof Post && (($user->id === $resource->user_id) || in_array($user->role, ['admin', 'superadmin'])),
      'comment', 'create_post' => true,
      default => false
    };
  }
}