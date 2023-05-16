<?php

namespace Estudia\InertiaUno\Console\Commands\Presets;

use Illuminate\Console\Command;

class InstallUno extends Command
{
    protected $signature = 'inertia-uno:install:uno';

    protected $description = 'Install Unocss and publish it\'s configuration';

    public function handle()
    {
        // Install unocss
        $this->npmInstallUnoCss();
        $this->npmInstallAutoImport();
    }

    public function npmInstallUnoCss()
    {
        $this->comment('Installing unocss and plugins ...');
        passthru('npm install -D unocss @unocss/preset-attributify @unocss/preset-uno  @unocss/preset-typography @unocss/preset-web-fonts @unocss/preset-mini  @unocss/preset-tagify @unocss/preset-rem-to-px @unocss/transformer-variant-group @unocss/transformer-directives @unocss/transformer-compile-class @unocss/preset-wind');
        passthru('npm install @unocss/reset');
    }

    public function npmInstallAutoImport()
    {
        $this->comment('Install Auto Import...');
        passthru('npm i -D unplugin-auto-import');
    }
}
