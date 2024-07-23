<?php

function add(int $a, int $b): int {
  return $a + $b;
}

var_dump(add(1, 3), add(1, 3));

$total = 0;

function addToTotal($value) {
  global $total;
  $total += $value;
  return $total;
}

var_dump(addToTotal(3), addToTotal(3));