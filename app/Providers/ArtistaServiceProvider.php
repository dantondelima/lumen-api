<?php

namespace App\Providers;

use App\Models\Artista;
use App\Repositories\ArtistaRepository;
use App\Services\ArtistaService;
use Illuminate\Support\ServiceProvider;

class ArtistaServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ArtistaService::class, function ($app) {
            return new ArtistaService(new ArtistaRepository(new Artista()));
        });
    }
}
