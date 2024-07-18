<?php

$person = "John";
$client = &$person;

var_dump($person, $client);

$client = "Robert";

var_dump($person, $client);

$person = "Harry";

var_dump($person, $client);