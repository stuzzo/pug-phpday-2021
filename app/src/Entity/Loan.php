<?php

declare(strict_types=1);

namespace App\Entity;

class Loan
{
    private User $requestUser;
    private \DateTime $requestDate;
    private float $amount;

    public function __construct(User $user, float $amount)
    {
        $this->requestUser = $user;
        $this->amount = $amount;
    }

    /**
     * @return User
     */
    public function getRequestUser(): User
    {
        return $this->requestUser;
    }

    /**
     * @return \DateTime
     */
    public function getRequestDate(): \DateTime
    {
        return $this->requestDate;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }


}