<?php

namespace App\Providers;

use App\Models\Artista;
use App\Models\Musica;
use App\Repositories\ArtistaRepository;
use App\Repositories\MusicaRepository;
use App\Services\ArtistaService;
use App\Services\MusicaService;
use Illuminate\Support\ServiceProvider;

class MusicaServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(MusicaService::class, function ($app) {
            return new MusicaService(new MusicaRepository(new Musica()));
        });
    }
}
