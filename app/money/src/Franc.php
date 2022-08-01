<?php

declare(strict_types=1);

namespace Money;

class Franc extends Money
{
    private string $currency;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
        $this->currency = "CHF";
    }

    function currency(): string
    {
        return $this->currency;
    }

    public function times(int $multiplier): Money
    {
        return new self($this->amount * $multiplier);
    }
}