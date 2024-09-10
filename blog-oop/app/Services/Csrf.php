<?php

namespace App\Services;

class CSRF {
  private const TOKEN_LENGTH = 32;
  private const TOKEN_LIFETIME = 30 * 60;
  public const TOKEN_FIELD_NAME = '_token';

  public static function getToken(): string {
    if (
      !isset($_SESSION['csrf_token']) 
        || static::isTokenExpired()
    ) {
      return static::generateToken();
    }
    return $_SESSION['csrf_token']['token'];
  }

  public static function verify(?string $token = null): bool {
    $method = $_SERVER['REQUEST_METHOD'];
    if (in_array($method, ['GET', 'HEAD', 'OPTIONS'])) {
      return true;
    }

    $csrfToken = $token ?? $_POST[static::TOKEN_FIELD_NAME] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';

    if (!empty($csrfToken) && !static::isTokenExpired() && hash_equals($_SESSION['csrf_token']['token'] ?? '', $csrfToken)) {
      static::generateToken();
      return true;
    }

    return false;
  }

  private static function generateToken(): string {
    $token = bin2hex(random_bytes(static::TOKEN_LENGTH));
    $_SESSION['csrf_token'] = [
      'token' => $token,
      'expires' => time() + static::TOKEN_LIFETIME
    ];
    return $token;
  }

  private static function isTokenExpired(): bool {
    $expires = $_SESSION['csrf_token']['expires'];
    return !isset($expires) || time() > $expires;
  }
}