<?php

namespace App\Services;

use App\Models\User;

class Auth {
  protected static $user = null;

  public static function attempt(string $email, string $password, bool $remember = false): bool {
    $user = User::findByEmail($email);
    if ($user && password_verify($password, $user->password)) {
      // Mark the user as being signed-in
      session_regenerate_id(true);
      $_SESSION['user_id'] = $user->id;
      if ($remember) {
        RememberMe::createToken($user->id);
      }
      return true;
    }
    return false;
  }

  public static function user(): ?User {
    if (static::$user === null) {
      $userId = $_SESSION['user_id'] ?? null;
      static::$user = $userId 
        ? User::find($userId) 
        : RememberMe::user();
    }
    return static::$user;
  }

  public static function logout(): void {
    RememberMe::clearToken();
    session_destroy();
    static::$user = null;
  }
}