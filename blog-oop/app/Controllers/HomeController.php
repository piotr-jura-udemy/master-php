<?php
namespace App\Controllers;

use App\Models\User;
use Core\View;

class HomeController {
  public function index() {
    User::create([
      'name' => 'Piotr',
      'email' => 'piotr@piotr.com',
      'role' => 'admin',
      'password' => password_hash('admin123', PASSWORD_DEFAULT)
    ]);
    User::create([
      'name' => 'John',
      'email' => 'john@piotr.com',
      'role' => 'admin',
      'password' => password_hash('john123', PASSWORD_DEFAULT)
    ]);
    return View::render(
      template: 'home/index', 
      data: ['message' => 'Hello!'],
      layout: 'layouts/main'
    );
  }
}