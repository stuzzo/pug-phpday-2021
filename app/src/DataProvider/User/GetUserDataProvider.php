<?php

declare(strict_types=1);

namespace App\DataProvider\User;

use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\DTO\Request\GetUserRequestDTO;
use App\DTO\Output\GetUserResponseDTO;
use App\Exception\ResourceNotFoundException;
use App\MessageBus\QueryBusInterface;
use App\Query\User\GetUserQuery;

final class GetUserDataProvider implements ItemDataProviderInterface, RestrictedDataProviderInterface
{
    private QueryBusInterface $queryBus;

    public function __construct(QueryBusInterface $queryBus)
    {
        $this->queryBus = $queryBus;
    }

    public function getItem(string $resourceClass, $id, string $operationName = null, array $context = []): GetUserResponseDTO
    {
        $query = new GetUserQuery($id);
        $userDTO = $this->queryBus->handle($query);

        if (null === $userDTO) {
            throw new ResourceNotFoundException('User', $id);
        }

        return $userDTO;
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return GetUserRequestDTO::class === $resourceClass;
    }
}