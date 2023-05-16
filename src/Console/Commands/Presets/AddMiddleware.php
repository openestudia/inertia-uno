<?php

namespace Estudia\InertiaUno\Console\Commands\Presets;

use Illuminate\Console\Command;

class AddMiddleware extends Command
{
    protected $signature = 'inertia-uno:add:middleware';

    protected $description = 'Add inertia middleware to kernel';

    public function handle()
    {
        $this->editHttpKernel();
    }

    public function editHttpKernel()
    {

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
            $this->comment('Inertia middleware has already been added to the web middleware group.');
        }
    }
}
