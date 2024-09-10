<?php

namespace App\Controllers;

use App\Models\Comment;
use App\Services\Auth;
use Core\Router;

class CommentController {
  public function store($id) {
    $content = $_POST['content'];
    Comment::create([
      'post_id' => $id,
      'user_id' => Auth::user()->id,
      'content' => $content
    ]);

    return Router::redirect("/posts/{$id}#comments");
  }
}