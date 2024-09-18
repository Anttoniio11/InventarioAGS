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

        $this->app->bind('App\Services\CategoriaTecnologicoService','App\Services\Implementations\CategoriaTecnologicoServiceImpl');
        $this->app->bind('App\Services\CategoriaFisicoService','App\Services\Implementations\CategoriaFisicoService');
        $this->app->bind('App\Services\CategoriaMedicoService','App\Services\Implementations\CategoriaMedicoService');
        $this->app->bind('App\Services\CategoriaInsumoService','App\Services\Implementations\CategoriaInsumoService');

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
