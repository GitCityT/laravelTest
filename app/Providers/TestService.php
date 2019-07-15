<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TestService extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('\App\Http\Custom',function($app){
            
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
