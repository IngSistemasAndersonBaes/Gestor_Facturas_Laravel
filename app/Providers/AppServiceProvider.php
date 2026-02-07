<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         // Detectar la IP de la máquina
        /* $localIp = getHostByName(getHostName()); */

        // Configurar APP_URL dinámicamente
        /* Config::set('app.url', "http://{$localIp}:8000"); */
        // 2. AGREGAR ESTE BLOQUE:
        if($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
