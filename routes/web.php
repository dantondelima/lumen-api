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
    $router->get('artistas', 'ArtistasController@index');
    $router->get('artistas/{id}', 'ArtistasController@show');
    $router->post('artistas', 'ArtistasController@store');
    $router->put('artistas/{id}', 'ArtistasController@update');
    $router->delete('artistas/{id}', 'ArtistasController@destroy');

    $router->get('musicas', 'MusicasController@index');
});




