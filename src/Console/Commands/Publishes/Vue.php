<?php

namespace Estudia\InertiaUno\Console\Commands\Publishes;

use Illuminate\Console\Command;

class Vue extends Command
{
    protected $signature = 'inertia-uno:publish:vue';

    protected $description = 'Publish vue files ';

    public function handle()
    {
        $stub_path = realpath(__DIR__ . "/../../../../stubs") . "/";

        $this->comment('Publish Vue Files');
        if ($this->publishes([
            $stub_path . "Components" => base_path("resources/js"),
        ], 'vue')) {
            $this->info('Components published successfully');
        } else {
            $this->error('Failed to copy the Components');
        }

        if ($this->publishes([
            $stub_path . "layouts" => base_path("resources/js"),
        ], 'vue')) {
            $this->info('layouts published successfully');
        } else {
            $this->error('Failed to copy the layouts');
        }
    }
}
