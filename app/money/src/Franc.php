<?php

declare(strict_types=1);

namespace Money;

class Franc extends Money
{
    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    function currency(): string
    {
        return "CHF";
    }

    public function times(int $multiplier): Money
    {
        return new self($this->amount * $multiplier);
    }
}