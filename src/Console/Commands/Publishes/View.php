<?php

namespace Estudia\InertiaUno\Console\Commands\Publish;

use Illuminate\Console\Command;

class View extends Command
{
    protected $signature = 'inertia-uno:publish:view';

    protected $description = 'Publish blade files ';

    public function handle()
    {
        $this->comment('Publish Views');
        if ($this->publishes([
            __DIR__ . '/../../../../stubs/app.blade.php' => resource_path('views'),
        ], 'view')) {
            $this->info('Views published successfully.');
        } else {
            $this->error('Failed to publish views');
        }
    }
}
