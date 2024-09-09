<?php

namespace App\Controllers;

use App\Models\Comment;
use App\Services\Auth;
use App\Services\CSRF;
use Core\Router;

class CommentController {
  public function store($id) {
    if (!CSRF::verify()) {
      Router::pageExpired();
    }

    $user = Auth::user();
    if (!$user) {
      Router::unauthorized();
    }

    $content = $_POST['content'];
    Comment::create([
      'post_id' => $id,
      'user_id' => $user->id,
      'content' => $content
    ]);

    return Router::redirect("/posts/{$id}#comments");
  }
}