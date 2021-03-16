<?php

declare(strict_types=1);

namespace App\MessageBus;

use App\Command\CommandInterface;

interface CommandBusInterface
{
    public function dispatch(CommandInterface $command): void;
}