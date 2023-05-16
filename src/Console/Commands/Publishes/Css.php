<?php

namespace Estudia\InertiaUno\Console\Commands\Publishes;

use Illuminate\Console\Command;

class Css extends Command
{
    protected $signature = 'inertia-uno:publish:css';

    protected $description = 'Publish css files ';

    public function handle()
    {
        $this->comment('Publish Css');
        passthru("php artisan vendor:publish --tag=inertia-uno-css --force");
    }
}
