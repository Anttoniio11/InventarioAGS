<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('App\Services\InventarioTecnologicoService','App\Services\Implementations\InventarioTecnologicoServiceImpl');
        $this->app->bind('App\Services\InventarioFisicoService','App\Services\Implementations\InventarioFisicoServiceImpl');
        $this->app->bind('App\Services\InventarioMedicoService','App\Services\Implementations\InventarioMedicoServiceImpl');
        $this->app->bind('App\Services\InventarioInsumoService','App\Services\Implementations\InventarioInsumoServiceImpl');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
