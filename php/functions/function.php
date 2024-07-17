<?php

function greet($name) {
  return "Hello, $name!\n";
}

echo greet("Alice");

function greetWithTime($name, $time = "day") {
  return "Good $time, $name\n";
}

echo greetWithTime("Bob");
echo greetWithTime("Charlie", "evening");