<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1;

use OpenApi\Attributes as OA;

#[
    OA\OpenApi(
        openapi: '3.1.0',
        info: new OA\Info(
            version: '1.0.0',
            description: 'Laravel OAS',
            title: 'Laravel',
        ),
        security: [
            [
                'jwt' => [],
            ],
        ],
    ),
    OA\SecurityScheme(
        securityScheme: 'jwt',
        type: 'http',
        in: 'header',
        scheme: 'bearer'
    ),
    OA\Parameter(
        name: 'id',
        in: 'path',
        required: true,
        schema: new OA\Schema(
            type: 'integer',
            example: 1
        )
    ),
    OA\Parameter(
        name: 'page',
        in: 'query',
        required: false,
        schema: new OA\Schema(
            type: 'integer',
            example: 1
        )
    ),
    OA\Parameter(
        name: 'per-page',
        in: 'query',
        required: false,
        schema: new OA\Schema(
            type: 'integer',
            example: 10
        )
    ),
    OA\Response(
        response: 204,
        description: 'No content',
        content: new OA\JsonContent()
    ),
]
abstract class AbstractController
{
}
