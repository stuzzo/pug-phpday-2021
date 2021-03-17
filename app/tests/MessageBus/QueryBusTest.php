<?php

declare(strict_types=1);

namespace App\Tests\MessageBus;

use App\MessageBus\QueryBusInterface;
use App\Query\QueryInterface;
use PHPUnit\Framework\TestCase;

final class QueryBusTest extends TestCase
{
    public function testQueryBusReturnsResponseCorrectly(): void
    {
        $data = ['test'];
        $query = $this->getFakeQuery();
        $queryBus = $this->getQueryBus($data);

        self::assertSame($data, $queryBus->handle($query));
    }

    private function getQueryBus(array $data): QueryBusInterface
    {
        return new class($data) implements QueryBusInterface {

            private array $data;

            public function __construct(array $data)
            {
                $this->data = $data;
            }

            public function handle(QueryInterface $query): array
            {
                return $this->data;
            }
        };
    }

    private function getFakeQuery(): QueryInterface
    {
        return new class() implements QueryInterface {};
    }
}