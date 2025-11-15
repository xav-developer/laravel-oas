<?php

declare(strict_types=1);

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

Route::get('/', function (): JsonResponse {
    return response()
        ->json();
});

Route::group([
    'middleware' => [
        'auth:api',
    ],
], static function (): void {
    // todo
});
