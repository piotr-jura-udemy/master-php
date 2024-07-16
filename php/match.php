<?php

$status = 600;

$message = match ($status) {
  200, 300 => 'Success',
  400, 404, 500 => 'Error',
  default => 'Unknown status'
};

// match >= 8.0

echo $message . "\n";