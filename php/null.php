<?php
declare(strict_types=1);
$abc = null;
$db = $abc ?? "default";
var_dump(
  null == null,
  null == false,
  null == 0,
  null == '',
  null == [],
  $abc,
  isset($abc),
  is_null($abc),
  $db,
  empty([])
);

function greet(?string $name) {
  echo "Hello, " . ($name ?? "stranger") . "!\n";
}

greet("Alice");
greet(null);

var_dump(
  array_filter([1, null, "", [], 3])
);