<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

error_reporting(E_ALL);
ini_set("display_errors", 1);

require __DIR__ . '/../vendor/autoload.php';

// Create Router instance
$router = new \Bramus\Router\Router();

$router->setNamespace('Controllers');

// routes for the categories endpoint
$router->get('/categories', 'CategoryController@getAll');
$router->get('/categories/(\d+)', 'CategoryController@getOne');
$router->post('/categories', 'CategoryController@create');
$router->put('/categories/(\d+)', 'CategoryController@update');
$router->delete('/categories/(\d+)', 'CategoryController@delete');

// routes for the articles endpoint
$router->get('/articles', 'ArticleController@getAll');
$router->get('/articles/(\d+)', 'ArticleController@getOne');
$router->post('/articles', 'ArticleController@create');
$router->put('/articles/(\d+)', 'ArticleController@update');
$router->delete('/articles/(\d+)', 'ArticleController@delete');

// routes for the users endpoint
$router->post('/users/login', 'UserController@login');
$router->post('/users/register', 'UserController@register');

// routers for the roles endpoint
$router->get('/roles', 'RolesController@getAll');
$router->get('/roles/(\d+)', 'RolesController@getOne');
$router->post('/roles', 'RolesController@create');
$router->put('/roles/(\d+)', 'RolesController@update');
$router->delete('/roles/(\d+)', 'RolesController@delete');

// routers for the contact endpoint
$router->post('/contact', 'ContactController@create');

// Run it!
$router->run();