<?php
namespace Core;

use PDO;

abstract class Model {
  protected static $table;

  public static function all(): array {
    $db = App::get('database');
    return $db->fetchAll("SELECT * FROM " . static::$table, [], static::class);
  }

  public static function find(mixed $id): static | null {
    $db = App::get('database');
    return $db->fetch("SELECT * FROM " . static::$table . " WHERE id = ?", [$id], static::class);
  }

  public static function create(array $data): static {
    $db = App::get('database');
    // 1) Get the names of columns inside $data
    $columns = implode(', ', array_keys($data));
    // -> id, title, created_at, content
    $placeholders = implode(', ', array_fill(0, count($data), '?'));
    // -> ?, ?, ?, ?
    $sql = "INSERT INTO " . static::$table . " ($columns) VALUES ($placeholders)";
    $db->query($sql, array_values($data));
    return static::find($db->lastInsertId());
  }
}