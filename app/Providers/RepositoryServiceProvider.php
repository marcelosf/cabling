<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\LocalRepository::class, \App\Repositories\LocalRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RackRepository::class, \App\Repositories\RackRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PatchRepository::class, \App\Repositories\PatchRepositoryEloquent::class);
        //:end-bindings:
    }
}
