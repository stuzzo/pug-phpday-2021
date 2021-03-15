<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string")
     */
    private string $id;

    /** @ORM\Column */
    private string $name;

    /** @ORM\Column */
    private string $email;

    /** @ORM\Column(name="registration_date", type="datetime")  */
    private \DateTime $registrationDate;

    public function __construct(string $id, string $name, string $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->registrationDate = new \DateTime();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getRegistrationDate(): \DateTime
    {
        return $this->registrationDate;
    }
}