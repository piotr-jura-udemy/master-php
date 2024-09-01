<?php

namespace App\Models;

use Core\App;
use Core\Model;

class Post extends Model {
  protected static $table = 'posts';

  public $id;
  public $user_id;
  public $title;
  public $content;
  public $views;
  public $created_at;

  public static function getRecent(?int $limit = null, ?string $search = null) {
    /** @var \Core\Database $db */
    $db = App::get('database');

    $query = "SELECT * FROM " . static::$table;
    $params = [];

    if ($search !== null) {
      $query .= " WHERE title LIKE ? OR content LIKE ?";
      $params = ["%$search%", "%$search%"];
    }

    $query .= " ORDER BY created_at DESC";

    if ($limit !== null) {
      $query .= " LIMIT ?";
      $params[] = $limit;
    }

    return $db->fetchAll($query, $params, static::class);
  }

  public static function incrementViews($id): void {
    $db = App::get('database');
    $db->query(
      "UPDATE posts SET views = views + 1 WHERE id = ?",
      [$id]
    );
  }
}