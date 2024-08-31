<?php

namespace App\Models;

use Core\App;
use Core\Model;

class Comment extends Model {
  protected static $table = 'comments';

  public $id;
  public $content;
  public $post_id;
  public $user_id;
  public $created_at;

  public static function forPost($postId): array {
    $db = App::get('database');
    return $db->fetchAll(
      "SELECT * FROM comments WHERE post_id = ? ORDER BY created_at DESC",
      [$postId],
      static::class
    );
  }
}