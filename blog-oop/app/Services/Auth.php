<?php

namespace App\Services;

use App\Models\User;

class Auth {
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
}