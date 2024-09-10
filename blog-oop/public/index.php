<?php
declare (strict_types = 1);

use App\Services\Auth;
use Core\Router;
use Core\View;

require_once __DIR__ . '/../bootstrap.php';
require_once __DIR__ . '/../helpers.php';

session_start();
$router = new Router();

require_once __DIR__ . '/../routes.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_SERVER['REQUEST_METHOD'];

echo $router->dispatch($uri, $method);