<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
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
        Paginator::useBootstrap();

        \Carbon\Carbon::setLocale('hy');

        Gate::define('admin', function () {
           if (auth()->id() === 1) return true;
        });

        Gate::define('productEdit', function () {
            if (auth()->id() != 1 && auth()->user()->product_permission === 2 || auth()->id() == 1) return true;
        });

        Gate::define('product', function () {
            if (auth()->id() != 1 && auth()->user()->product_permission != 0 || auth()->id() == 1) return true;
        });

        Gate::define('specEdit', function () {
            if (auth()->id() != 1 && auth()->user()->special_permission === 2 || auth()->id() == 1) return true;
        });

        Gate::define('spec', function () {
            if (auth()->id() != 1 && auth()->user()->special_permission != 0 || auth()->id() == 1) return true;
        });

        Gate::define('homeEdit', function () {
            if (auth()->id() != 1 && auth()->user()->home_permission === 2 || auth()->id() == 1) return true;
        });

        Gate::define('home', function () {
            if (auth()->id() != 1 && auth()->user()->home_permission != 0 || auth()->id() == 1) return true;
        });
    }
}
