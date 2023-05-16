<?php

namespace Estudia\InertiaUno\Console\Commands\Publish;

use Illuminate\Console\Command;

class Js extends Command
{
    protected $signature = 'inertia-uno:publish:js';

    protected $description = 'Publish Js files ';

    public function handle()
    {
        $stub_path = realpath(__DIR__ . "/../../../../stubs") . "/";
        $this->comment('Publish Js');
        $this->info('copy app.js ...');
        if ($this->publishes([$stub_path . "app.js" => resource_path("js/app.js")], 'js')) {
            $this->info('app.js copied successfully');
        } else {
            $this->error('Failed to copy the app.js');
        }

        $this->info('copy autoimport.plugin.js ...');
        if ($this->publishes([$stub_path . "autoimport.plugin.js" => resource_path("js/autoimport.plugin.js")], 'js')) {
            $this->info('autoimport.plugin.js copied successfully');
        } else {
            $this->error('Failed to copy the autoimport.plugin.js');
        }

        $this->info('copy inertiauno.plugin.js ...');
        if ($this->publishes([$stub_path . "inertiauno.plugin.js" => resource_path("js/inertiauno.plugin.js")], 'js')) {
            $this->info('inertiauno.plugin.js copied successfully');
        } else {
            $this->error('Failed to copy the inertiauno.plugin.js');
        }

        $this->info('copy layout.plugin.js ...');
        if ($this->publishes([$stub_path . "layout.plugin.js" => resource_path("js/layout.plugin.js")], 'js')) {
            $this->info('layout.plugin.js copied successfully');
        } else {
            $this->error('Failed to copy the layout.plugin.js');
        }

        $this->info('copy uno.config.js ...');
        if ($this->publishes([$stub_path . "uno.config.js" => base_path("uno.config.js"), $stub_path . "tailwind.config.js" => base_path("tailwind.config.js")], 'js')) {
            $this->info('uno.config.js copied successfully');
        } else {
            $this->error('Failed to copy the uno.config.js');
        }
    }
}
