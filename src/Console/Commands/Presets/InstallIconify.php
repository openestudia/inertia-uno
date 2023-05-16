<?php

namespace Estudia\InertiaUno\Console\Commands\Presets;

use Illuminate\Console\Command;

class InstallIconify extends Command
{
    protected $signature = 'inertia-uno:install:iconify';

    protected $description = 'Install vue Iconify';

    public function handle()
    {
        // Install Iconify
        $this->npmInstallVueIconify();
    }

    public function npmInstallVueIconify()
    {
        $this->comment('Install Iconify for Vue...');
        passthru('npm i -D @iconify/vue');
    }
}
