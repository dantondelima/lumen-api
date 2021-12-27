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


/** @var \Laravel\Lumen\Routing\Router $router */
$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router){
    $router->get('artistas', 'ArtistaController@index');
    $router->get('artistas/{id}', 'ArtistaController@show');
    $router->post('artistas', 'ArtistaController@store');
    $router->put('artistas/{id}', 'ArtistaController@update');
    $router->delete('artistas/{id}', 'ArtistaController@destroy');

    $router->get('musicas', 'MusicaController@index');
});




