<?php

namespace App\Services;

use App\Models\User;

class Auth {
  protected static $user = null;

  public static function attempt(string $email, string $password): bool {
    $user = User::findByEmail($email);
    if ($user && password_verify($password, $user->password)) {
      // Mark the user as being signed-in
      session_regenerate_id(true);
      $_SESSION['user_id'] = $user->id;
      return true;
    }
    return false;
  }

  public static function user(): ?User {
    if (static::$user === null) {
      $userId = $_SESSION['user_id'] ?? null;
      static::$user = $userId ? User::find($userId) : null;
    }
    return static::$user;
  }
}