<?php

namespace App\Controllers\Admin;

use Core\View;

class DashboardController {
  public function index() {
    return View::render('admin/dashboard/index', [], 'layouts/admin');
  }
}