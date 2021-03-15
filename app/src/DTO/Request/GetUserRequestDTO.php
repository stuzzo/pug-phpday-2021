<?php

declare(strict_types=1);

namespace App\DTO\Request;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\DTO\Output\GetUserResponseDTO;

#[ApiResource(
    collectionOperations: [],
    itemOperations: [
        'get' => [
            'method' => 'GET',
            'path' => '/users/{id}',
            'requirements' => ['id' => '\w+'],
            'openapi_context' => [
                'summary' => 'Find user by id',
            ]
        ]
    ],
    shortName: 'User',
    output: GetUserResponseDTO::class
)]
final class GetUserRequestDTO
{
    #[ApiProperty(identifier: true)]
    public string $id;
}