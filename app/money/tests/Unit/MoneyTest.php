<?php

declare(strict_types=1);

namespace Money\Tests\Unit;

use Money\Dollar;
use Money\Tests\TestCase;

class MoneyTest extends TestCase
{
    public function testMultiplication()
    {
        $five = new Dollar(5);
        $product = $five->times(2);
        $this->assertSame(10, $five->amount);
        $product = $five->times(3);
        $this->assertSame(15, $five->amount);
    }
}