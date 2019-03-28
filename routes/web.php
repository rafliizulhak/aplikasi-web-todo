<?php

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

$router->post('/todo','todoController@create');
$router->get('/todo','todoController@read');
$router->post('/todo/{id}','todoController@update');
$router->delete('/todo/{id}','todoController@delete');
$router->get('/todo/{id}', 'todoController@detail');
