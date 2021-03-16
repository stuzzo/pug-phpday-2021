<?php

declare(strict_types=1);

namespace App\Handler\Command\User;

use App\Command\User\RegisterUserCommand;
use App\Entity\User;
use App\Handler\Command\CommandHandlerInterface;
use App\Repository\User\UserRepositoryInterface;

final class RegisterUserHandler implements CommandHandlerInterface
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(RegisterUserCommand $command)
    {
        $user = new User($command->getUuid(), $command->getName(), $command->getEmail());

        $this->userRepository->save($user);
    }

    public static function getHandledMessages(): iterable
    {
        yield RegisterUserCommand::class => [
            'method' => '__invoke',
            'priority' => 10,
            'from_transport' => 'async'
        ];
    }
}