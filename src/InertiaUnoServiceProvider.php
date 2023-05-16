<?php

namespace Estudia\InertiaUno;

use Estudia\InertiaUno\Console\Commands\InstallUnoCommand;
use Estudia\InertiaUno\Console\Commands\Presets\InstallUno as PresetsUnoCommand;
use Estudia\InertiaUno\Console\Commands\Presets\InstallIconify as PresetsIconifyCommand;
use Estudia\InertiaUno\Console\Commands\Presets\InstallInertia as PresetsInstallInertia;
use Estudia\InertiaUno\Console\Commands\Presets\InstallLodash as PresetsInstallLodash;
use Estudia\InertiaUno\Console\Commands\Presets\AddMiddleware as PresetsAddMiddleware;
use Estudia\InertiaUno\Console\Commands\Publishes\Css as PublishCss;
use Estudia\InertiaUno\Console\Commands\Publishes\Js as PublishJs;
use Estudia\InertiaUno\Console\Commands\Publishes\View as PublishView;
use Estudia\InertiaUno\Console\Commands\Publishes\Vite as PublishVite;
use Estudia\InertiaUno\Console\Commands\Publishes\Vue as PublishVue;
use Illuminate\Support\ServiceProvider;
use Estudia\InertiaUno\Console\Commands\GenerateVueI18nCommand;

class InertiaUnoServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallUnoCommand::class,
                PresetsUnoCommand::class,
                PresetsIconifyCommand::class,
                PresetsInstallInertia::class,
                PresetsInstallLodash::class,
                PresetsAddMiddleware::class,
                PublishCss::class,
                PublishJs::class,
                PublishView::class,
                PublishVite::class,
                PublishVue::class,
                GenerateVueI18nCommand::class,
            ]);
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
