<?php
declare(strict_types=1);

// PHP 5 - types
// PHP 7 - strict types
function add(int $a, int $b): int {
  return $a + $b;
}

var_dump(add((int)5.0, 3));