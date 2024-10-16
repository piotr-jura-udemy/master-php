<?php

$databaseDriver = 'sqlite';

return [
    'app' => [
        'name' => 'FileSharing',
        'debug' => false,
    ],
    'database' => [
        'driver' => $databaseDriver,
        'dbname' => __DIR__ . '/database/db.sqlite',
    ],
];