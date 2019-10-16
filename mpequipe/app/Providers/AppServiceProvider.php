<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// ATTENTION: NE PAS OUBLIER CETTE LIGNE
use Illuminate\Support\Facades\Schema;

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
        // POUR CORRIGER LE BUG
        // Illuminate\Database\QueryException  : 
        // SQLSTATE[42000]: 
        // too long; max key length is 767 bytes (SQL: alter table `us

        Schema::defaultStringLength(191);

    }
}
