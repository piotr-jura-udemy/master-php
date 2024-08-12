<?php
declare(strict_types=1);

const INCLUDES_DIR = __DIR__ . '/../includes';
const ROUTES_DIR = __DIR__ . '/../routes';

session_start();
require_once INCLUDES_DIR . '/router.php';

// handle request
dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);