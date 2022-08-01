<?php

declare(strict_types=1);

namespace Money;

class Franc extends Money
{
    public function times(int $multiplier): Money
    {
        return new Franc($this->amount * $multiplier, $this->currency);
    }
}