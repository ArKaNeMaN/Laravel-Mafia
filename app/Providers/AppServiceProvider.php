<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;

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
        Paginator::useBootstrap();

        Blade::if('role', function ($provider) {
            switch ($provider) {
                case 'any':
                    if(!Auth::check())
                        return false;
                break;

                case 'guest':
                    if(!Auth::guest())
                        return false;
                break;

                default:
                    if(!Auth::check())
                        return false;
                    if(Auth::user()->role != $provider)
                        return false;
                break;
            }
            return true;
        });
    }
}
