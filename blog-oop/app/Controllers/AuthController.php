<?php

namespace App\Controllers;

use Core\View;

class AuthController {
  public function create() {
    return View::render(
      template: 'auth/create',
      layout: 'layouts/main',
    );
  }

  public function store() {
    var_dump($_POST);
    die('form sent!');
  }
}