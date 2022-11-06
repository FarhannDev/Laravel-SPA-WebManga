<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \Illuminate\Support\Facades\URL;
<<<<<<< HEAD
use Illuminate\Pagination\Paginator;
=======
>>>>>>> 7d62a52dd05649d0d8c46880ba00e06e9dd19a72

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
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
<<<<<<< HEAD
        Paginator::useBootstrap();
=======
>>>>>>> 7d62a52dd05649d0d8c46880ba00e06e9dd19a72
    }
}
