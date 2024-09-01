<?php

use Core\View;

if (!function_exists('partial')) {
  function partial(string $template, array $data = []): string {
    return View::partial($template, $data);
  }
}