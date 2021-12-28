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

use App\Models\Artista;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api', 'middleware' => 'autenticador'], function () use ($router){
    $router->group(['prefix' => 'artistas', 'as' => 'Artista'], function () use ($router){
        $router->get('', 'ArtistaController@index');
        $router->get('{id}', 'ArtistaController@show');
        $router->post('', ['uses' => 'ArtistaController@store', 'middleware' => 'ValidaMiddleware']);
        $router->put('{id}',  ['uses' => 'ArtistaController@update', 'middleware' => 'ValidaMiddleware']);
        $router->delete('{id}', 'ArtistaController@destroy');
    });

    $router->group(['prefix' => 'musicas', 'as' => 'Musica'], function () use ($router){
        $router->get('', 'MusicaController@index');
        $router->get('{id}', 'MusicaController@show');
        $router->post('', ['uses' => 'MusicaController@store', 'middleware' => 'ValidaMiddleware']);
        $router->put('{id}',  ['uses' => 'MusicaController@update', 'middleware' => 'ValidaMiddleware']);
        $router->delete('{id}', 'MusicaController@destroy');
    });

});

$router->post('api/login', 'TokenController@gerarToken');




