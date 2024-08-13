<?php

function connectDb(): PDO {
  $pdo = new PDO('sqlite:' . DB_DIR . '/' . 'db.sqlite');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $pdo;
}
