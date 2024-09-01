<?php
declare (strict_types = 1);
require_once __DIR__ . '/../bootstrap.php';

use Core\Router;

$router = new Router();
require_once __DIR__ . '/../routes.php';
require_once __DIR__ . '/../helpers.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_SERVER['REQUEST_METHOD'];
echo $router->dispatch($uri, $method);