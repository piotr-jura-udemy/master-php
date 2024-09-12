<?php
/**
 * @var Core\Router $router
 */

use App\Middlewares\Auth;
use App\Middlewares\CSRF;
use App\Middlewares\View;

$router->addGlobalMiddleware(View::class);
$router->addGlobalMiddleware(CSRF::class);
$router->addRouteMiddleware('auth', Auth::class);

$router->add('GET', '/', 'HomeController@index');
$router->add('GET', '/posts', 'PostController@index');
$router->add('GET', '/posts/{id}', 'PostController@show');
$router->add('POST', '/posts/{id}/comments', 'CommentController@store', ['auth']);

$router->add('GET', '/login', 'AuthController@create');
$router->add('POST', '/login', 'AuthController@store');
$router->add('POST', '/logout', 'AuthController@destroy');

// ============ Admin Panel Routes
$router->add('GET', '/admin/dashboard', 'Admin\DashboardController@index', ['auth']);

$router->add('GET', '/admin/posts', 'Admin\PostController@index', ['auth']);
$router->add('GET', '/admin/posts/create', 'Admin\PostController@create', ['auth']);
$router->add('POST', '/admin/posts', 'Admin\PostController@store', ['auth']);
$router->add('GET', '/admin/posts/{id}/edit', 'Admin\PostController@edit', ['auth']);
$router->add('POST', '/admin/posts/{id}', 'Admin\PostController@update', ['auth']);
$router->add('POST', '/admin/posts/{id}/delete', 'Admin\PostController@delete', ['auth']);