<?php
declare(strict_types=1);

const CSRF_TOKEN_LENGTH = 32;
const CSRF_TOKEN_LIFETIME = 60 * 30; // 30 minutes

function generateCsrfToken(): string {
  $token = bin2hex(random_bytes(CSRF_TOKEN_LENGTH));
  setCsrfTokenAndTime($token);
  return $token;
}

function getCsrfTokenAndTime(): array {
  return [
    $_SESSION['csrf_token'] ?? null,
    $_SESSION['csrf_token_time'] ?? null,
  ];
}

function setCsrfTokenAndTime(string $token): void {
  $_SESSION['csrf_token'] = $token;
  $_SESSION['csrf_token_time'] = time();
}

function isTokenExpired(?int $time): bool {
  return $time === null || (time() - $time) > CSRF_TOKEN_LIFETIME;
}

function getCurrentCsrfToken(): string {
  // 1. To check if there is a valid, non-expired token already
  //    return if it exists
  // 2. Generate a new one
  //    return it
  [$token, $time] = getCsrfTokenAndTime();
  if (!isset($token, $time) || isTokenExpired($time)) {
    return generateCsrfToken();
  }
  return $_SESSION['csrf_token'];
}

function validateCsrfToken(?string $token): bool {
  return false;
}