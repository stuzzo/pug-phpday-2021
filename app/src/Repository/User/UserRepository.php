<?php

declare(strict_types=1);

namespace App\Repository\User;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

final class UserRepository extends ServiceEntityRepository implements UserRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function getUserById(string $id): ?User
    {
        return $this->find($id);
    }
}