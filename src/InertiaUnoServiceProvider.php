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

        $this->publishes([
            __DIR__ . '/../stubs/app.blade.php' => resource_path('views/app.blade.php'),
        ], 'inertia-uno-view');
        $this->publishes([
            __DIR__ . '/../stubs/app.css' => resource_path('css/app.css'),
        ], 'inertia-uno-css');
        $this->publishes([
            __DIR__ . '/../stubs/vite.config.js' => base_path('vite.config.js'),

        ], 'inertia-uno-vite');
        $this->publishes([
            __DIR__ . '/../stubs/Components' => resource_path("js/Components"),
            __DIR__ . '/../stubs/layouts' => resource_path("js/layouts"),
            __DIR__ . '/../stubs/Pages' => resource_path("js/Pages"),

        ], 'inertia-uno-vue');
        $this->publishes([
            __DIR__ . '/../stubs/app.js' => resource_path('js/app.js'),
            __DIR__ . '/../stubs/autoimport.plugin.js' => resource_path('js/autoimport.plugin.js'),
            __DIR__ . '/../stubs/inertiauno.plugin.js' => resource_path('js/inertiauno.plugin.js'),
            __DIR__ . '/../stubs/layout.plugin.js' => resource_path('js/layout.plugin.js'),
            __DIR__ . '/../stubs/uno.config.js' => base_path('uno.config.js'),
            __DIR__ . '/../stubs/tailwind.config.js' => base_path('tailwind.config.cjs'),
        ], 'inertia-uno-js');
    }
}
