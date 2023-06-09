<?php

namespace Estudia\InertiaUno\Console\Commands\Publishes;

use Illuminate\Support\Traits\Macroable;

use Illuminate\Console\Command;

class View extends Command
{
    use Macroable;
    protected $signature = 'inertia-uno:publish:view';

    protected $description = 'Publish blade files ';

    public function handle()
    {
        $this->comment('Publish Views');
        passthru("php artisan vendor:publish --tag=inertia-uno-view --force");
    }
}
