<?php

declare(strict_types=1);

namespace Money;

class Dollar extends Money
{
    public function times(int $multiplier): Money
    {
        return new Dollar($this->amount * $multiplier, $this->currency);
    }
}