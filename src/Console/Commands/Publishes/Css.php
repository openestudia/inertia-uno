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
        if ($this->publish('stubs/app.css', resource_path('css/app.css'), 'css')) {
            $this->info('Publish Css files successfully');
        } else {
            $this->error('Failed to publish Css files');
        }
    }
}
