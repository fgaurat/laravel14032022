<?php

namespace App\Providers;

use App\Interfaces\RepositoryInterface;
use App\Repositories\TodoRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(RepositoryInterface::class, TodoRepository::class);
    }
}
