<?php

echo "Welcome to PHP\n";

$name = "Alice";
echo "Hello, " . $name . "!\n";

$pizzas = 3;
$slicesPerPizza = 8;
$totalSlices = $pizzas * $slicesPerPizza;

echo "Total pizza slices: " . $totalSlices . "\n";

$isHungry = false;

echo "Hungry?";
echo $isHungry ? "Yes" : "No"; 
echo "\n";