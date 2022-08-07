<?php

declare(strict_types=1);

namespace Money;

interface Expression
{
    public function reduce(string $to): Money;
}