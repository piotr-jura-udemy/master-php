<?php
declare(strict_types=1);

namespace App\Controllers;

use Core\View;

class IndexController {
  public function index() {
    return View::render(
      template: 'home/index', 
      layout: 'layouts/main',
    );
  }
}