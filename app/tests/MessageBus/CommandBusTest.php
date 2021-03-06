<?php

declare(strict_types=1);

namespace App\Tests\MessageBus;

use App\Command\CommandInterface;
use App\MessageBus\CommandBus;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;

final class CommandBusTest extends TestCase
{
    public function testCommandWillBeDispatchedCorrectly(): void
    {
        $command = $this->getFakeCommand();
        $symfonyCommandBus = $this->getSymfonyCommandBus();
        $commandBus = new CommandBus($symfonyCommandBus);
        $commandBus->dispatch($command);

        self::assertSame($command, $symfonyCommandBus->getDispatchedCommand());
    }

    private function getSymfonyCommandBus(): MessageBusInterface
    {
        return new class() implements MessageBusInterface {

            private CommandInterface $command;

            public function dispatch($message, array $stamps = []): Envelope
            {
                $this->command = $message;

                return new Envelope($message);
            }

            public function getDispatchedCommand(): CommandInterface
            {
                return $this->command;
            }
        };
    }

    private function getFakeCommand(): CommandInterface
    {
        return new class() implements CommandInterface {};
    }
}