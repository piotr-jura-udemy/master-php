<?php

use App\Services\Authorization;
use Core\View;
use App\Services\CSRF;

if (!function_exists('partial')) {
  function partial(string $template, array $data = []): string {
    return View::partial($template, $data);
  }
}

if (!function_exists('csrf_token')) {
  function csrf_token(): string {
    $tokenField = CSRF::TOKEN_FIELD_NAME;
    $token = CSRF::getToken();
    return <<<TAG
      <input type="hidden" name="$tokenField" value="$token" />
    TAG;
  }
}

if (!function_exists('check')) {
  function check(string $action, mixed $resource = null): bool {
    return Authorization::check($action, $resource);
  } 
}