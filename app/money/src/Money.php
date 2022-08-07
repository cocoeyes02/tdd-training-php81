<?php

declare(strict_types=1);

namespace Money;

class Money implements Expression
{
    public readonly int $amount;
    public readonly string $currency;

    public function __construct(int $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function times(int $multiplier): Expression
    {
        return new Money($this->amount * $multiplier, $this->currency);
    }

    public function plus(Expression $addend): Expression
    {
        return new Sum($this, $addend);
    }

    public function reduce(Bank $bank, string $to): self
    {
        $rate = $bank->rate($this->currency, $to);
        return new Money($this->amount / $rate, $to);
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

    public static function dollar(int $amount): self
    {
        return new Money($amount, "USD");
    }

    public static function franc(int $amount): self
    {
        return new Money($amount, "CHF");
    }
}