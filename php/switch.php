<?php

$size = "L";

switch ($size) {
  case "S":
  case "M":
    echo "Small or Medium size\n";
    break;
  case "L":
  case "XL":
    echo "Large or Extra Large size\n";
    break;
  default:
    echo "Unknown size\n";
}

if ("M" == $size || "S" == $size) {
  echo "Small or Medium size\n";
} elseif ("L" == $size || "XL" == $size) {
  echo "Large or Extra Large size\n";
} else {
  echo "Unknown size\n";
}

$badAttempts = 2;

switch ($badAttempts) {
  case 3:
    echo "You are blocked!\n";
  default:
    echo "Bad attempt detected!\n";
}