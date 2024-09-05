<?php
/**
 * @var Core\Router $router
 */
$router->add('GET', '/', 'HomeController@index');
$router->add('GET', '/posts', 'PostController@index');
$router->add('GET', '/posts/{id}', 'PostController@show');

$router->add('GET', '/login', 'AuthController@create');
$router->add('POST', '/login', 'AuthController@store');