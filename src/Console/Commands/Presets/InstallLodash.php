<?php

namespace Estudia\InertiaUno\Console\Commands\Presets;

use Illuminate\Console\Command;

class InstallLodash extends Command
{
    protected $signature = 'inertia-uno:install:lodash';

    protected $description = 'Install Lodash js';

    public function handle()
    {
        // Install unocss
        $this->npmInstallLodash();
    }

    public function npmInstallLodash()
    {
        // Install lodash
        $this->comment('Installing lodash and plugins ...');
        passthru('npm install lodash > /dev/null 2>&1');
    }
}
