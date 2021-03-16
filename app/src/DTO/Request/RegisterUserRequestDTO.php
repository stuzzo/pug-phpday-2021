<?php

declare(strict_types=1);

namespace App\DTO\Request;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\User\RegisterUserController;
use Symfony\Component\Validator\Constraints as Assert;

#[ApiResource(
    collectionOperations: [
        'register_user' => [
            'method' => 'POST',
            'path' => '/users',
            'controller' => RegisterUserController::class,
            'openapi_context' => [
                'summary' => 'Add new user',
                'description' => 'Register a new user from scratch',
            ],
        ]
    ],
    itemOperations: [],
    shortName: 'User',
    output: false
)]
final class RegisterUserRequestDTO implements RequestDTO
{
    #[Assert\NotBlank]
    #[ApiProperty(attributes: [
        'openapi_context' => [
            'type' => 'string',
            'example' => 'John'
        ]
    ])]
    public string $name;

    #[ApiProperty(identifier: true)]
    #[Assert\Email]
    #[Assert\NotBlank]
    public string $email;
}