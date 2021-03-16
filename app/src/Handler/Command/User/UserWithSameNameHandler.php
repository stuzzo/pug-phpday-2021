<?php

declare(strict_types=1);

namespace App\Handler\Command\User;

use App\Command\User\RegisterUserCommand;
use App\Entity\User;
use App\Handler\Command\CommandHandlerInterface;
use App\Repository\User\UserRepositoryInterface;
use Symfony\Component\Messenger\Exception\UnrecoverableMessageHandlingException;

final class UserWithSameNameHandler implements CommandHandlerInterface
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(RegisterUserCommand $command)
    {
        $user = $this->userRepository->getUserByName($command->getName());
        if (null !== $user) {
            //throw new UnrecoverableMessageHandlingException(sprintf('User with name %s already exists', $user->getName()));
        }
    }

    public static function getHandledMessages(): iterable
    {
        yield RegisterUserCommand::class => [
            'method' => '__invoke',
            'priority' => 1,
            'from_transport' => 'async'
        ];
    }
}