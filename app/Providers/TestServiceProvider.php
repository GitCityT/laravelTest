<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
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
        //视图间共享数据
        view()->share('project_name','LaravelTest');
        //
        view()->composer('custom.index',function($view){
            $view->with('avatar','/images/logo.png');
        });//指定视图绑定数据
    }
}
