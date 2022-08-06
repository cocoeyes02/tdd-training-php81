<?php

declare(strict_types=1);

namespace Money;

class Sum implements Expression
{
    public readonly Money $augend;
    public readonly Money $addend;

    public function __construct(Money $augend, Money $addend)
    {
        $this->augend = $augend;
        $this->addend = $addend;
    }
}