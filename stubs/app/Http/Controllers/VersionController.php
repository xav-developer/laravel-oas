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
    public function v1(): Response
    {
        $generator = Generator::scan([
            app_path('Http/Controllers/V1'),
            app_path('Http/Resources/V1'),
        ]);

        $generator->servers = [
            new OA\Server(url('/api/v1'), config('app.name')),
        ];

        return response(
            content: $generator->toJson(),
            headers: [
                'Content-Type' => 'application/json',
            ]
        );
    }
}
