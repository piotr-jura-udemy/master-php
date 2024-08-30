<?php
namespace App\Controllers;

use App\Models\Post;
use Core\View;

class HomeController {
  public function index() {
    $posts = Post::getRecent(5);

    return View::render(
      template: 'home/index', 
      data: [
        'posts' => $posts
      ],
      layout: 'layouts/main'
    );
  }
}