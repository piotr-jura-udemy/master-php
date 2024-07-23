<?php
$users = [
    ['id' => 1, 'name' => 'Alice', 'role' => 'admin'],
    ['id' => 2, 'name' => 'Bob', 'role' => 'user'],
    ['id' => 3, 'name' => 'Charlie', 'role' => 'user'],
];
function createFilter($key, $value) {
  return fn($item) => $item[$key] === $value;
}
$isAdmin = createFilter('role', 'admin');
$isBob = createFilter('name', 'Bob');
$admins = array_filter($users, $isAdmin);
var_dump($admins);
var_dump(array_filter($users, $isBob));
