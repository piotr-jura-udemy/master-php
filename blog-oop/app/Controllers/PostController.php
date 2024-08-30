<?php

namespace App\Controllers;

class PostController {
  public function index() {
    return "All posts";
  }

  public function show($id) {
    return "Post nr $id";
  }
}