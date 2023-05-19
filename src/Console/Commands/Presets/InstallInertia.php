<?php

namespace Estudia\InertiaUno\Console\Commands\Presets;

use Illuminate\Console\Command;

class InstallInertia extends Command
{
    protected $signature = 'inertia-uno:install:inertia';

    protected $description = 'Install Inertiajs';

    public function handle()
    {
        $this->installInertia();
    }

    public function npmInstallInertia()
    {
        $this->comment('Installing inertia vue 3 ...');
        passthru('npm install @inertiajs/vue3');
        $this->comment('Installing Inertia-laravel ...');
        passthru('composer require inertiajs/inertia-laravel');
        $this->comment('Installing middleware ...');
        passthru('php artisan inertia:middleware');
    }

    function installInertia()
    {
        // Install inertia vue
        $this->npmInstallInertia();
    }
}
