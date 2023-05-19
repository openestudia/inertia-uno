<?php

namespace Estudia\InertiaUno\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallUnoCommand extends Command
{
    protected $signature = 'inertia-uno:install';

    protected $description = 'Install Unocss and other frontend feature and add it to vite.config.js of Laravel project';

    public function handle()
    {
        // install all
        if ($this->output->confirm("Do you want to install InertiaJS?")) {
            $this->call('inertia-uno:install:inertia');
        }
        if ($this->output->confirm("Do you want to add inertia handler to middleware?")) {
            $this->call('inertia-uno:add:middleware');
        }

        if ($this->output->confirm("Do you want to install VueI18n?")) {
            $this->call('vue-i18n:generate');
        }

        if ($this->output->confirm("Do you want to install Lodash?")) {
            $this->call('inertia-uno:install:lodash');
        }

        if ($this->output->confirm("Do you want to install UNOCSS?")) {
            $this->call('inertia-uno:install:uno');
        }

        if ($this->output->confirm("Do you want to install VUE Iconify?")) {
            $this->call('inertia-uno:install:iconify');
        }

        if ($this->output->confirm("Do you want to publish views?")) {
            $this->call('inertia-uno:publish:view');
        }

        if ($this->output->confirm("Do you want to publish css files?")) {
            $this->call('inertia-uno:publish:css');
        }

        if ($this->output->confirm("Do you want to publish js files?")) {
            $this->call('inertia-uno:publish:js');
        }

        if ($this->output->confirm("Do you want to publish vue files?")) {
            $this->call('inertia-uno:publish:vue');
        }

        if ($this->output->confirm("Do you want to update vite config file")) {
            $this->call('inertia-uno:publish:vite');
        }



        $this->info('Unocss installation and configuration completed.');
    }

    function publishStubs()
    {
        $stub_path = realpath(__DIR__ . "/../../../stubs") . "/";

        $this->info('copy app.blade.php ...');
        if (File::copy($stub_path . "app.blade.php", resource_path("views/app.blade.php"))) {
            $this->info('app.blade.php copied successfully');
        } else {
            $this->error('Failed to copy the app.blade.php');
        }

        $this->info('copy app.css ...');
        if (File::copy($stub_path . "app.css", resource_path("css/app.css"))) {
            $this->info('app.css copied successfully');
        } else {
            $this->error('Failed to copy the app.css');
        }

        $this->info('copy app.js ...');
        if (File::copy($stub_path . "app.js", resource_path("js/app.js"))) {
            $this->info('app.js copied successfully');
        } else {
            $this->error('Failed to copy the app.js');
        }

        $this->info('copy autoimport.plugin.js ...');
        if (File::copy($stub_path . "autoimport.plugin.js", resource_path("js/autoimport.plugin.js"))) {
            $this->info('autoimport.plugin.js copied successfully');
        } else {
            $this->error('Failed to copy the autoimport.plugin.js');
        }

        $this->info('copy inertiauno.plugin.js ...');
        if (File::copy($stub_path . "inertiauno.plugin.js", resource_path("js/inertiauno.plugin.js"))) {
            $this->info('inertiauno.plugin.js copied successfully');
        } else {
            $this->error('Failed to copy the inertiauno.plugin.js');
        }

        $this->info('copy layout.plugin.js ...');
        if (File::copy($stub_path . "layout.plugin.js", resource_path("js/layout.plugin.js"))) {
            $this->info('layout.plugin.js copied successfully');
        } else {
            $this->error('Failed to copy the layout.plugin.js');
        }

        $this->info('copy uno.config.js ...');
        if (File::copy($stub_path . "uno.config.js", base_path("uno.config.js")) && File::copy($stub_path . "tailwind.config.js", base_path("tailwind.config.js"))) {
            $this->info('uno.config.js copied successfully');
        } else {
            $this->error('Failed to copy the uno.config.js');
        }

        $this->info('copy vite.config.js ...');
        if (File::copy($stub_path . "vite.config.js", base_path("vite.config.js"))) {
            $this->info('vite.config.js copied successfully');
        } else {
            $this->error('Failed to copy the vite.config.js');
        }

        $this->info('copy sample vue pages ...');
        if (File::copyDirectory($stub_path . "Components", base_path("resources/js"))) {
            $this->info('Components copied successfully');
        } else {
            $this->error('Failed to copy the Components');
        }

        $this->info('copy sample vue layouts ...');
        if (File::copyDirectory($stub_path . "layouts", base_path("resources/js"))) {
            $this->info('layouts copied successfully');
        } else {
            $this->error('Failed to copy the layouts');
        }
    }
}
