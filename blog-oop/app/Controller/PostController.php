<?php

namespace App\Controller;

class PostController {
  public function index() {
    return "All posts";
  }

  public function show($id) {
    return "Post nr $id";
  }
}