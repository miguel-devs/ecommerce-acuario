<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Laravel\Cashier\Cashier;
use Inertia\Inertia;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*
            $this->app->bind('path.public',function(){
            return'/home/m3lj6s02c2ok/public_html';
            });

            */
            Cashier::ignoreMigrations();

           
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        Cashier::ignoreMigrations();
        Schema::defaultStringLength(191); 
    }
}
