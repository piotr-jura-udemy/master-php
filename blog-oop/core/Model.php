<?php

namespace Core;

abstract class Model {
  protected static string $table;
  public $id;

  public static function all(): array {
    $db = App::get('database');
    return $db->fetchAll("SELECT * FROM " . static::$table, [], static::class);
  }

  public static function find(mixed $id): ?static {
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

  public function save(): static {
    $db = App::get('database');
    $data = get_object_vars($this);

    if (!isset($this->id)) {
      unset($data['id']);
      return static::create($data);
    }

    unset($data['id']);
    $setParts = array_map(
      fn($column) => "$column = ?", 
      array_keys($data)
    );
    $sql = "UPDATE " 
      . static::$table 
      . " SET " 
      . implode(', ', $setParts) 
      . " WHERE id = ?";
    $params = array_values($data);
    $params[] = $this->id;
    $db->query($sql, $params);
    return $this;
  }

  public function delete(): void {
    if (!isset($this->id)) {
      return;
    }

    $db = App::get('database');
    $sql = "DELETE FROM " . static::$table . " WHERE id = ?";
    $db->query($sql, [$this->id]);
  }

  public static function getRecent(
    ?int $limit = null, 
    ?int $page = null
  ) {
    /** @var \Core\Database $db */
    $db = App::get('database');
    $query = "SELECT * FROM " . static::$table;
    $params = [];
    $query .= " ORDER BY created_at DESC";

    if ($limit !== null) {
      $query .= " LIMIT ?";
      $params[] = $limit;
    }

    if ($page !== null && $limit !== null) {
      $offset = ($page - 1) * $limit;
      $query .= " OFFSET ?";
      $params[] = $offset;
    }

    return $db->fetchAll($query, $params, static::class);
  }

  public static function count(): int {
    /** @var \Core\Database $db */
    $db = App::get('database');
    $query = "SELECT COUNT(*) FROM " . static::$table;
    return (int) $db->query($query, [])->fetchColumn();
  }
}