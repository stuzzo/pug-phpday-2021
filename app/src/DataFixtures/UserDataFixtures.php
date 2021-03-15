<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

final class UserDataFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        foreach ($this->getUsers() as $user) {
            $manager->persist($user);
        }

        $manager->flush();
    }

    private function getUsers(): iterable
    {
        yield new User("1", 'Mario', 'mario.rossi@test.it');
        yield new User("2",'Guido', 'guido.vespa@test.it');
        yield new User("3",'Antonio', 'antonio.verdi@test.it');
    }
}