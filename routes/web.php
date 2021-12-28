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

$router->group(['prefix' => 'api', 'middleware' => 'autenticador'], function () use ($router){
    $router->group(['prefix' => 'artistas'], function () use ($router){
        $router->get('', 'ArtistaController@index');
        $router->get('{id}', 'ArtistaController@show');
        $router->post('', 'ArtistaController@store');
        $router->put('{id}', 'ArtistaController@update');
        $router->delete('{id}', 'ArtistaController@destroy');
    });

    $router->get('musicas', 'MusicaController@index');
});

$router->post('api/login', 'TokenController@gerarToken');




