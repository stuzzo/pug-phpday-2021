<?php

declare(strict_types=1);

namespace App\Query\User;

use App\Query\QueryInterface;

final class UserWithSameEmailExistsQuery implements QueryInterface
{
    private string $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}