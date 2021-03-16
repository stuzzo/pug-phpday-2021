<?php

declare(strict_types=1);

namespace App\Handler\Query\User;

use App\DTO\Output\GetUserResponseDTO;
use App\Entity\User;
use App\Handler\Query\QueryHandlerInterface;
use App\Query\User\GetUserQuery;
use App\Repository\User\UserRepositoryInterface;

final class GetUserQueryHandler implements QueryHandlerInterface
{
    private UserRepositoryInterface $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(GetUserQuery $userQuery): ?GetUserResponseDTO
    {
        /** @var User $user */
        $user = $this->repository->getUserById($userQuery->getId());
        if (null === $user) {
            return null;
        }

        return new GetUserResponseDTO($user->getName(), $user->getEmail());
    }
}