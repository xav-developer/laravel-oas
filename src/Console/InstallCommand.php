<?php

declare(strict_types=1);

namespace Krok\Oas\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\InteractsWithComposerPackages;

class InstallCommand extends Command
{
    use InteractsWithComposerPackages;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'oas:install {--composer=global}';

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

        $this->requireComposerPackages($this->option('composer'), [
            'swagger-api/swagger-ui:^5.19',
            'zircote/swagger-php:^5.0',
        ]);

        $this->info('OAS scaffolding installed successfully.');

        return self::SUCCESS;
    }
}
