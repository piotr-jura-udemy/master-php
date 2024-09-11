<?php

namespace App\Controllers;

use App\Models\Comment;
use App\Services\Auth;
use App\Services\Authorization;
use Core\Router;

class CommentController {
  public function store($id) {
    Authorization::verify('comment');
    
    $content = $_POST['content'];
    Comment::create([
      'post_id' => $id,
      'user_id' => Auth::user()->id,
      'content' => $content
    ]);

    return Router::redirect("/posts/{$id}#comments");
  }
}