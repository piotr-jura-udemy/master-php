<?php

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Core\App;

require_once __DIR__ . '/../bootstrap.php';

$users = [
    ['name' => 'Admin User', 'email' => 'admin@example.com', 'password' => password_hash('admin123', PASSWORD_DEFAULT), 'role' => 'admin'],
    ['name' => 'John Doe', 'email' => 'john@example.com', 'password' => password_hash('password123', PASSWORD_DEFAULT), 'role' => 'user'],
    ['name' => 'Jane Smith', 'email' => 'jane@example.com', 'password' => password_hash('password123', PASSWORD_DEFAULT), 'role' => 'user'],
];

$posts = [
    ['user_id' => 1, 'title' => 'Welcome to Our Blog', 'content' => 'This is our first blog post. We hope you enjoy it!'],
    ['user_id' => 2, 'title' => 'PHP Tips and Tricks', 'content' => 'Here are some useful PHP tips and tricks for beginners...'],
    ['user_id' => 3, 'title' => 'Web Development Best Practices', 'content' => 'In this post, we\'ll discuss some web development best practices...'],
];

$comments = [
    ['post_id' => 1, 'user_id' => 2, 'content' => 'Great first post! Looking forward to more.'],
    ['post_id' => 1, 'user_id' => 3, 'content' => 'Welcome to the blogosphere!'],
    ['post_id' => 2, 'user_id' => 1, 'content' => 'These are some really useful tips, thanks!'],
    ['post_id' => 3, 'user_id' => 2, 'content' => 'I\'ve been using these practices and they really help.'],
];

$db = App::get('database');

// Clear existing data?
$db->query("DELETE FROM comments");
$db->query("DELETE FROM posts");
$db->query("DELETE FROM users");

$db->query(
  "DELETE FROM sqlite_sequence WHERE name IN ('users', 'posts', 'comments')"
);

foreach ($users as $user) {
  User::create($user);
}

foreach ($posts as $post) {
  Post::create($post);
}

foreach ($comments as $comment) {
  Comment::create($comment);
}

echo "Fixtures loaded successfully.\n";