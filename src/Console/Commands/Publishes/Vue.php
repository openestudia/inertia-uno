<?php

namespace Estudia\InertiaUno\Console\Commands\Publishes;

use Illuminate\Console\Command;
use Illuminate\Support\Traits\Macroable;

class Vue extends Command
{
    use Macroable;
    protected $signature = 'inertia-uno:publish:vue';

    protected $description = 'Publish vue files ';

    public function handle()
    {

        $this->comment('Publish Vue Files');
        passthru("php artisan vendor:publish --tag=inertia-uno-vue --force");
    }
}
