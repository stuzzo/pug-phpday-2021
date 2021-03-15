<?php


namespace App\Entity;


class Payment
{
    private User $user;
    private float $amount;
    private \DateTime $date;
}