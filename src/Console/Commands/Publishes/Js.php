<?php

namespace Estudia\InertiaUno\Console\Commands\Publishes;

use Illuminate\Console\Command;
use Illuminate\Support\Traits\Macroable;

class Js extends Command
{
    use Macroable;
    protected $signature = 'inertia-uno:publish:js';

    protected $description = 'Publish Js files ';

    public function handle()
    {
        $this->comment('Publish Js');
        passthru("php artisan vendor:publish --tag=inertia-uno-js --force");
    }
}
