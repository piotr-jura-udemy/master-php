<?php

namespace App\Controllers\Admin;

use App\Models\Post;
use App\Services\Auth;
use App\Services\Authorization;
use Core\Router;
use Core\View;

class PostController {
  public function index() {
    // + Pagination
    // + Search
    Authorization::verify('dashboard');
    return View::render(
      template: 'admin/post/index',
      layout: 'layouts/admin',
      data: ['posts' => Post::all()]
    );
  }

  public function create() {
    Authorization::verify('create_post');
    return View::render(
      template: 'admin/post/create',
      layout: 'layouts/admin'
    );
  }

  public function store() {
    Authorization::verify('create_post');
    $data = [
      'title' => $_POST['title'],
      'content' => $_POST['content'],
      'user_id' => Auth::user()->id,
    ];
    Post::create($data);
    Router::redirect('/admin/posts');
  }

  public function edit($id) {
    $post = Post::find($id);
    Authorization::verify('edit_post', $post);
    return View::render(
      template: 'admin/post/edit',
      layout: 'layouts/admin',
      data: ['post' => $post]
    );
  }

  public function update($id) {
    $post = Post::find($id);
    Authorization::verify('edit_post', $post);
    $post->title = $_POST['title'];
    $post->content = $_POST['content'];
    $post->save();
    // + static update()
    Router::redirect('/admin/posts');
  }

  public function delete($id) {
    // Post::findOrFail($id)
    // + Able to do by yourself
    $post = Post::find($id);
    Authorization::verify('delete_post', $post);
    $post->delete();
    Router::redirect('/admin/posts');
  }
}