<?php

function doubleValue(int &$number): int {
  $number *= 2;
  return $number;
}

$original = 5;
doubleValue($original);
var_dump($original);