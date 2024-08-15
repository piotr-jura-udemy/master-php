<?php
function addFlashMessage(string $type, string $message): void {
  $_SESSION['flash'][$type] = $message;
}

function getFlashMessages(): array {
  $messages = $_SESSION['flash'] ?? [];
  unset($_SESSION['flash']);
  return $messages;
}