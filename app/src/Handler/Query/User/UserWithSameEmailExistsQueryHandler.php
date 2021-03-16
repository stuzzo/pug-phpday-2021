<?php

declare(strict_types=1);

namespace App\Handler\Query\User;

use App\DTO\Output\GetUserResponseDTO;
use App\Entity\User;
use App\Handler\Query\QueryHandlerInterface;
use App\Query\User\GetUserQuery;
use App\Query\User\UserWithSameEmailExistsQuery;
use App\Repository\User\UserRepositoryInterface;

final class UserWithSameEmailExistsQueryHandler implements QueryHandlerInterface
{
    private UserRepositoryInterface $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(UserWithSameEmailExistsQuery $userQuery): bool
    {
        return null !== $this->repository->getUserByEmail($userQuery->getEmail());
    }
}