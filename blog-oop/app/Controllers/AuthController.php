<?php

namespace App\Controllers;

use App\Services\Auth;
use Core\Router;
use Core\View;

class AuthController {
  public function create() {
    return View::render(
      template: 'auth/create',
      layout: 'layouts/main',
    );
  }

  public function store() {
    // Todo: CSRF token
    $email = $_POST['email'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']) ? (bool)$_POST['remember'] : false;

    // Attempt auth
    if (Auth::attempt($email, $password)) {
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