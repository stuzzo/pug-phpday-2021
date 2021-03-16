<?php

declare(strict_types=1);

namespace App\Repository\User;

use App\Entity\User;

interface UserRepositoryInterface
{
    public function getUserById(string $id): ?User;

    public function getUserByName(string $name): ?User;

    public function getUserByEmail(string $email): ?User;

    public function save(User $user): void;
}