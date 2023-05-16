<?php

namespace Estudia\InertiaUno\Console\Commands\Publish;

use Illuminate\Console\Command;

class Vite extends Command
{
    protected $signature = 'inertia-uno:publish:vite';

    protected $description = 'Publish vite.config.js ';

    public function handle()
    {
        $stub_path = realpath(__DIR__ . "/../../../../stubs") . "/";

        $this->comment('Publish Vite Config File');
        $this->info('copy vite.config.js ...');
        if ($this->publishes([$stub_path . 'vite.config.js' => base_path('vite.config.js')], 'vite')) {
            $this->info('vite.config.js copied successfully');
        } else {
            $this->error('Failed to copy the vite.config.js');
        }
    }
}
