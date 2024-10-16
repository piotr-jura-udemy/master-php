<?php

use Core\App;
use Core\Models\User;

require_once __DIR__ . '/../bootstrap.php';

$db = App::get('database');

$users = [
    ['name' => 'Admin User', 'email' => 'admin@example.com', 'password' => password_hash('admin123', PASSWORD_DEFAULT), 'role' => 'admin'],
    ['name' => 'John Doe', 'email' => 'john@example.com', 'password' => password_hash('password123', PASSWORD_DEFAULT), 'role' => 'user'],
    ['name' => 'Jane Smith', 'email' => 'jane@example.com', 'password' => password_hash('password123', PASSWORD_DEFAULT), 'role' => 'user'],
];

// Clear existing data?
$db->query("DELETE FROM users");
$db->query("DELETE FROM remember_tokens");

$db->query(
  "DELETE FROM sqlite_sequence WHERE name IN ('users', 'remember_tokens')"
);

foreach ($users as $user) {
  User::create($user);
}

echo "Fixtures loaded successfully.\n";