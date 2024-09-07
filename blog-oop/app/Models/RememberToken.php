<?php

namespace App\Models;

use Core\Model;

class RememberToken extends Model {
  protected static string $table = 'remember_tokens';
  private const TOKEN_LIFETIME = 30 * 24 * 60 * 60;

  public ?int $id;
  public int $user_id;
  public string $token;
  public string $expires_at;
  public string $created_at;

  private static function generateToken(): string {
    return bin2hex(random_bytes(32));
  }

  private static function getExpiryDate(): string {
    return date('Y-m-d H:i:s', time() + static::TOKEN_LIFETIME);
  }

  public static function createForUser(int $userId): static {
    return static::create([
      'user_id' => $userId,
      'token' => static::generateToken(),
      'expires_at' => static::getExpiryDate()
    ]);
  }
}