<?php

declare(strict_types=1);

namespace App\DTO\Output;

final class GetUserResponseDTO
{
    /**
     * @var string $name
     */
    public string $name;

    /**
     * @var string $email
     */
    public string $email;

    public function __construct(string $name, string $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}