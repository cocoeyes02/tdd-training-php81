<?php

declare(strict_types=1);

namespace Money;

class Dollar
{
    public int $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public function times(int $multiplier)
    {
        $this->amount *= $multiplier;
        return null;
    }
}