<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::prefix('/v1')
    ->group(static function (): void {
        Route::middleware([
            'auth:api',
        ])->group(static function (): void {
            // Route::apiResource();
        });
    });
