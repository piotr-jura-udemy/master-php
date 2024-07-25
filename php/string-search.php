<?php

$haystack = "The quick brown fox";
$pos = strpos($haystack, "quick");
var_dump($pos);

var_dump(str_replace("quick", "lazy", $haystack));

preg_match_all('/\w{5}/', $haystack, $matches);
var_dump($matches);