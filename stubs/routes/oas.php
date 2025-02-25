<?php

declare(strict_types=1);

use App\Http\Controllers\SwaggerController;
use App\Http\Controllers\VersionController;
use Illuminate\Support\Facades\Route;

Route::get('/oas/swagger', SwaggerController::class)->name('oas.swagger');

Route::get('/oas/version/v1.json', [VersionController::class, 'v1'])->name('oas.version.v1');
