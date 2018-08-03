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
        //$this->app->make('Rdotti\Contatti\Http\Controllers\ContattiController');
        $this->loadViewsFrom(__DIR__.'/views/contatti', 'contatti');
    }
}
