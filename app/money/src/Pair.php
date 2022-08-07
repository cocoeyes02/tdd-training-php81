<?php

declare(strict_types=1);

namespace Money;

class Pair
{
    private string $from;
    private string $to;

    public function __construct(string $from, string $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function equals(Object $object): bool
    {
        $cast = fn($result): Pair => $result;
        $pair = $cast($object);
        return $this->from === $pair->from && $this->to === $pair->to;
    }

    public static function hashCode(): int
    {
        return 0;
    }
}