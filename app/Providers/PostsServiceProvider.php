<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PostsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\Http\Repositories\PostsRepositoryInterface', 'App\Http\Repositories\PostsRepository');
    }
}
