<?php

declare(strict_types=1);

namespace App\Command\User;

use App\Command\CommandInterface;

final class RegisterUserCommand implements CommandInterface
{

    private string $uuid;

    private string $name;

    private string $email;

    public function __construct(string $uuid, string $name, string $email)
    {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->email = $email;
    }

    public function getUuid(): string
    {
        return $this->uuid;
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