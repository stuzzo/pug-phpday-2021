<?php

declare(strict_types=1);

namespace App\Controller\User;

use App\Command\User\RegisterUserCommand;
use App\DTO\Request\RegisterUserRequestDTO;
use App\MessageBus\CommandBusInterface;
use App\MessageBus\QueryBusInterface;
use App\Query\User\UserWithSameEmailExistsQuery;
use App\Service\UuidService;
use App\Service\ValidatorService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class RegisterUserController
{
    private ValidatorService $validatorService;
    private QueryBusInterface $queryBus;
    private CommandBusInterface $commandBus;
    private UuidService $uuidService;

    public function __construct(
        ValidatorService $validatorService,
        QueryBusInterface $queryBus,
        CommandBusInterface $commandBus,
        UuidService $uuidService
    ) {
        $this->validatorService = $validatorService;
        $this->queryBus = $queryBus;
        $this->commandBus = $commandBus;
        $this->uuidService = $uuidService;
    }

    public function __invoke(RegisterUserRequestDTO $data): JsonResponse
    {
        $errors = $this->validatorService->validateData($data);
        if ($errors) {
            return new JsonResponse($errors, Response::HTTP_BAD_REQUEST);
        }

        if ($this->userWithSameEmailExists($data)) {
            return new JsonResponse(
                ['error' => 'User with the same email already exists'],
                Response::HTTP_CONFLICT
            );
        }

        // Get new uuid for resource
        $uuid = $this->getNewUuid();
        $registerUserCommand = new RegisterUserCommand($uuid, $data->name, $data->email);
        $this->commandBus->dispatch($registerUserCommand);

        return new JsonResponse(
            ['id' => $uuid],
            Response::HTTP_ACCEPTED
        );
    }

    private function userWithSameEmailExists(RegisterUserRequestDTO $data): bool
    {
        return $this->queryBus->handle(new UserWithSameEmailExistsQuery($data->email));
    }

    private function getNewUuid(): string
    {
        return $this->uuidService->getUuid();
    }

}