<?php
namespace Core;

use PDO;

abstract class Model {
  protected static $table;

  public static function all(): array {
    $db = App::get('database');
    $results = $db->query("SELECT * FROM " . static::$table)
      ->fetchAll(PDO::FETCH_ASSOC);
    return array_map([static::class, 'createFromArray'], $results);
  }

  public static function find(mixed $id): static | null {
    $db = App::get('database');
    $result = $db->query("SELECT * FROM " . static::$table . " WHERE id = ?", [$id])
      ->fetch(PDO::FETCH_ASSOC);
    return $result ? static::createFromArray($result) : null;
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

  protected static function createFromArray(array $data): static {
    $model = new static();
    foreach ($data as $key => $value) {
      if (property_exists($model, $key)) {
        $model->$key = $value;
      }
    }
    return $model;
  }
}