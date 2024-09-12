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
    return View::render(
      template: 'admin/post/index',
      layout: 'layouts/admin',
      data: ['posts' => Post::all()]
    );
  }

  public function create() {
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
    return View::render(
      template: 'admin/post/edit',
      layout: 'layouts/admin',
      data: ['post' => Post::find($id)]
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
    $post->delete();
    Router::redirect('/admin/posts');
  }
}