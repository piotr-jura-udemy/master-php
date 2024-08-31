<?php

namespace App\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Core\Router;
use Core\View;

class PostController {
  public function index() {
    return "All posts";
  }

  public function show($id) {
    $post = Post::find($id);
    if (!$post) {
      Router::notFound();
    }
    $comments = Comment::forPost($id);
    Post::incrementViews($id);
    return View::render(
      template: 'post/show',
      layout: 'layouts/main',
      data: ['post' => $post, 'comments' => $comments]
    );
  }
}