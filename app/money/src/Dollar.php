<?php

declare(strict_types=1);

namespace Money;

class Dollar
{
    private int $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public function times(int $multiplier): self
    {
        return new self($this->amount * $multiplier);
    }

    public function equals(self $object): bool
    {
        return $this->amount === $object->amount;
    }
}