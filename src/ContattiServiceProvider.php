<?php

namespace Rdotti\Contatti\Providers;

use Illuminate\Support\ServiceProvider;

class ContattiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        include __DIR__.'/routes/web.php';
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->mergeConfigFrom(__DIR__ . '/config/contatti.php', 'contatti');
        $this->loadViewsFrom(__DIR__.'/views/contatti', 'contatti');
    }
}
