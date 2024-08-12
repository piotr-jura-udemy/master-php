<?php
declare(strict_types=1);

const INCLUDES_DIR = __DIR__ . '/../includes';
const ROUTES_DIR = __DIR__ . '/../routes';
const TEMPLATES_DIR = __DIR__ . '/../templates';

session_start();
require_once INCLUDES_DIR . '/router.php';
require_once INCLUDES_DIR . '/view.php';

// handle request
dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);