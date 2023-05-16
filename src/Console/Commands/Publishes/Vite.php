<?php

namespace Estudia\InertiaUno\Console\Commands\Publishes;

use Illuminate\Console\Command;

class Vite extends Command
{
    protected $signature = 'inertia-uno:publish:vite';

    protected $description = 'Publish vite.config.js ';

    public function handle()
    {

        $this->comment('Publish Vite Config File');
        passthru("php artisan vendor:publish --tag=inertia-uno-vite");
    }
}
