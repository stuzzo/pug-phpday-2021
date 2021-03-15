<?php

declare(strict_types=1);

namespace App\Query\User;

use App\Query\QueryInterface;

final class GetUserQuery implements QueryInterface
{
    private string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

}