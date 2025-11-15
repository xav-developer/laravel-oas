<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use OpenApi\Attributes as OA;
use OpenApi\Generator;

class VersionController
{
    /**
     * @return Response
     */
    public function api(): Response
    {
        $generator = (new Generator())
            ->generate([
                app_path('Http/Controllers'),
                // app_path('Http/Requests'),
                app_path('Http/Resources'),
            ]);

        $generator
            ->servers = [
                new OA\Server(url('/api'), config('app.name')),
            ];

        $generator
            ->components
            ->securitySchemes = [
                new OA\SecurityScheme(
                    securityScheme: 'jwt',
                    type: 'http',
                    in: 'header',
                    scheme: 'bearer'
                ),
            ];

        return response(
            content: $generator->toJson(),
            headers: [
                'Content-Type' => 'application/json',
            ]
        );
    }
}
