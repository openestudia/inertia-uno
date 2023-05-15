<?php

namespace Estudia\InertiaUno;

use Estudia\InertiaUno\Console\Commands\InstallUnoCommand;
use Illuminate\Support\ServiceProvider;
use Estudia\InertiaUno\Console\Commands\GenerateVueI18nCommand;

class InertiaUnoServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallUnoCommand::class,
                GenerateVueI18nCommand::class,
            ]);
        }
        if ($this->app->runningInConsole()) {
        }

        $this->publishes([
            __DIR__ . '/config/inertia-uno.php' => config_path('inertia-uno.php'),
        ]);

        $this->mergeConfigFrom(
            __DIR__ . '/config/inertia-uno.php',
            'inertia-uno'
        );
    }
}
