<?php

declare(strict_types=1);

namespace Money;

abstract class Money
{
    protected int $amount;
    protected string $currency;

    abstract function times(int $multiplier): self;

    public function currency(): string
    {
        return $this->currency;
    }

    public function equals(self $money): bool
    {
        return $this->amount === $money->amount
            && $this::class === $money::class;
    }

    static function dollar(int $amount): self
    {
        return new Dollar($amount);
    }

    static function franc(int $amount): self
    {
        return new Franc($amount, "CHF");
    }
}