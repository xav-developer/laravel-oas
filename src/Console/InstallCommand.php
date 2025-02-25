<?php

declare(strict_types=1);

namespace Krok\Oas\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install:oas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the oas package';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $filesystem = new Filesystem();

        $filesystem->copyDirectory(__DIR__ . '/../../stubs/app', base_path('app'));
        $filesystem->copyDirectory(__DIR__ . '/../../stubs/resources', base_path('resources'));
        $filesystem->copyDirectory(__DIR__ . '/../../stubs/routes', base_path('routes'));

        return 0;
    }
}
