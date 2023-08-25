<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/users', 'Api\UserController@getUsers');
$router->get('/users/{id}', 'Api\UserController@getUser');
$router->post('/users', 'Api\UserController@postUser');
$router->put('/users/{id}', 'Api\UserController@updateUser');
$router->delete('/users/{id}', 'Api\UserController@deleteUser');
