<?php

$secret = "magic";
$attempts = 0;
$maxAttemps = 5;

while ($attempts < $maxAttemps) {
  echo "Guess the password: ";
  $guess = trim(fgets(STDIN));
  $attempts++;

  if ($guess == $secret) {
    echo "Correct! You've unlocked the treasure! 💎\n";
    break;
  } elseif ($attempts == $maxAttemps) {
    echo "Out of attempts! The treseaure remains locked. 🔒 \n";
  } else {
    echo "Wrong! Try again. Attempts left: " . ($maxAttemps - $attempts) . "\n";
  }
}