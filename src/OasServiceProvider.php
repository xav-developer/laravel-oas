<?php

declare(strict_types=1);

namespace Krok\Oas;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Krok\Oas\Console\InstallCommand;

class OasServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function boot(): void
    {
        if (!$this->app->runningInConsole()) {
            return;
        }

        $this->commands([
            InstallCommand::class,
        ]);
    }

    /**
     * @return class-string[]
     */
    public function provides(): array
    {
        return [
            InstallCommand::class,
        ];
    }
}
