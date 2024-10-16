<?php

namespace App\Controllers;

use Core\Router;
use Core\Services\Auth;
use Core\View;

class UserController {
  public function create() {
    return View::render(
      template: 'user/create',
      layout: 'layouts/main',
    );
  }

  public function store() {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']) ? (bool)$_POST['remember'] : false;

    // Attempt auth
    if (Auth::attempt($email, $password, $remember)) {
      Router::redirect('/');
    }

    return View::render(
      template: 'auth/create',
      layout: 'layouts/main',
      data: [
        'error' => 'Invalid credentials'
      ]
    );
  }

  public function destroy() {
    Auth::logout();
    Router::redirect('/login');
  }
}