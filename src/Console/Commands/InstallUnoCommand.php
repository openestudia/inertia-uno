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


        $this->installInertia();

        $this->installLodash();

        $this->installUno();

        $this->copyFiles();

        $this->info('Unocss installation and configuration completed.');
    }

    function installInertia()
    {
        // Install inertia vue
        $this->info('Installing inertia vue 3 ...');
        passthru('npm install @inertiajs/vue3');
        $this->info('Installing middleware ...');
        passthru('php artisan inertia:middleware');

        // Define the middleware class
        $inertiaMiddleware = '\App\Http\Middleware\HandleInertiaRequests::class';

        // Get the content of the Kernel.php file
        $kernelContent = file_get_contents(app_path('Http/Kernel.php'));


        // Find the 'web' middleware group and add the inertia middleware to the end
        // Check if the middleware has already been added
        if (strpos($kernelContent, $inertiaMiddleware) === false) {
            $newContent = preg_replace(
                "/'web' => \[(.*?)\],/s",
                "'web' => [$1\t\t{$inertiaMiddleware},],",
                $kernelContent,
                1
            );
            file_put_contents(app_path('Http/Kernel.php'), $newContent);

            $this->info('Added Inertia middleware to the web middleware group.');
        } else {
            $this->info('Inertia middleware has already been added to the web middleware group.');
        }
    }

    function installLodash()
    {
        // Install lodash
        $this->info('Installing lodash and plugins ...');
        passthru('npm install lodash > /dev/null 2>&1');
    }

    function installUno()
    {
        // Install unocss
        $this->info('Installing unocss and plugins ...');
        passthru('npm install -D unocss @unocss/preset-attributify @unocss/preset-uno  @unocss/preset-typography @unocss/preset-web-fonts @unocss/preset-mini  @unocss/preset-tagify @unocss/preset-rem-to-px @unocss/transformer-variant-group @unocss/transformer-directives @unocss/transformer-compile-class @unocss/preset-wind');
        passthru('npm install @unocss/reset');
        $this->info('Install Auto Import...');
        passthru('npm i -D unplugin-auto-import');
        $this->info('Install Iconify for Vue...');
        passthru('npm i -D @iconify/vue');
    }

    function copyFiles()
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
