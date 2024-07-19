<?php

$superhero = "Superman";

function revealIdentity() {
  global $superhero;
  $message = "real name is Clark Kent";
  // $superhero = "Spiderman";
  echo "$superhero $message\n";
}

revealIdentity();
echo $superhero;

function countVistors() {
  static $visitorCount = 0;
  $visitorCount++;
  echo "Visitor #$visitorCount has arrived!\n";
}

// function getDb() {
//   static $db;

//   if ($db === null) {
//     $db = connect();
//   }

//   return $db;
// }

countVistors();
countVistors();
countVistors();