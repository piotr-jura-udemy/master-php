<?php

$secret = "magic";
$attempts = 0;
$maxAttempts = 5;

while ($attempts < $maxAttempts) {
  echo "Guess the password: ";
  $guess = trim(fgets(STDIN));
  $attempts++;

  if ($guess == $secret) {
    echo "Correct! You've unlocked the treasure! 💎\n";
    break;
  } elseif ($attempts == $maxAttempts) {
    echo "Out of attempts! The treasure remains locked. 🔒 \n";
  } else {
    echo "Wrong! Try again. Attempts left: " . ($maxAttempts - $attempts) . "\n";
  }
}
