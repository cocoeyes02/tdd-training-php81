<?php

declare(strict_types=1);

namespace Money;

class Money
{
    protected int $amount;
    protected string $currency;

    public function __construct(int $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    function times(int $multiplier)
    {
        return null;
    }

    public function currency(): string
    {
        return $this->currency;
    }

    public function equals(self $money): bool
    {
        return $this->amount === $money->amount
            && $this->currency() === $money->currency();
    }

    static function dollar(int $amount): self
    {
        return new Dollar($amount, "USD");
    }

    static function franc(int $amount): self
    {
        return new Franc($amount, "CHF");
    }
}