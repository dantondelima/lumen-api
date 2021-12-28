<?php

namespace App\Providers;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserService::class, function ($app) {
            return new UserService(new UserRepository(new User()));
        });
    }
}
