<?php

namespace App\Controllers\Admin;

use App\Models\Comment;
use App\Models\Post;
use App\Services\Authorization;
use Core\View;

class DashboardController {
  public function index() {
    Authorization::verify('dashboard');
    
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