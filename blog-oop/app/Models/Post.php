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

  public static function getRecent(int $limit) {
    /** @var \Core\Database $db */
    $db = App::get('database');
    return $db->fetchAll(
      "SELECT * FROM " . static::$table . " ORDER BY created_at DESC LIMIT ?",
      [$limit],
      static::class
    );
  }

  public static function incrementViews($id): void {
    $db = App::get('database');
    $db->query(
      "UPDATE posts SET views = views + 1 WHERE id = ?",
      [$id]
    );
  }
}