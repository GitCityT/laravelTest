<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Validator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Blade::directive('localTime', function ($expression) {
            return "<?php 
                        if(is_numeric($expression)){
                            echo date('Y-m-d H:i:s',$expression+3600*9);
                        }
                        else{
                           echo date('Y-m-d H:i:s',strtotime($expression)+3600*9); 
                        }
                    ?>";
        });

        Schema::defaultStringLength(191);//数据库建用户表主键长度

        // \URL::forceScheme('https');//使用htpps网址
        
        Validator::extend('numchar',function($attribute,$value,$parameters,$validator){
            return preg_match('/^\w+\d+$/', $value);
        });//自定义表单验证规则
    }
}
