<?php

namespace App\Providers;


use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        Schema::defaultStringLength(191);
        Paginator::useBootstrapFive();

        // Custom blade template
        
        Blade::if('bladeTesting', function ($value) {
            return 'saimon' == $value;
        });
        Blade::if('admin', function () {
            return Auth::user()->role == 'admin';
        }); 
        Blade::if('notAuthor', function () {
            return Auth::user()->role != 'author';
        });

    }
}
