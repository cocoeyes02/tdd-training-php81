<?php

declare(strict_types=1);

namespace Money;

class Franc extends Money
{
    public function __construct(int $amount, ?string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency ?? "CHF";
    }

    public function times(int $multiplier): Money
    {
        return new self($this->amount * $multiplier, null);
    }
}