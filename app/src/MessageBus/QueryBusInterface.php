<?php

declare(strict_types=1);

namespace App\MessageBus;

use App\Query\QueryInterface;

interface QueryBusInterface
{
    public function handle(QueryInterface $query): mixed;
}