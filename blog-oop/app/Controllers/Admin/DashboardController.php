<?php

namespace App\Controllers\Admin;

use App\Models\Comment;
use App\Models\Post;
use Core\View;

class DashboardController {
  public function index() {
    $totalPosts = Post::count();
    $totalComments = Comment::count();
    $recentPosts = Post::getRecent(5);
    $recentComments = Comment::getRecent(5);

    return View::render(
      'admin/dashboard/index', 
      [
        'totalPosts' => $totalPosts,
        'totalComments' => $totalComments,
        'recentPosts' => $recentPosts,
        'recentComments' => $recentComments
      ], 
      'layouts/admin'
    );
  }
}