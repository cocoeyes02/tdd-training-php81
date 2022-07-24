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
        $five->times(2);
        $this->assertEquals(10, $five->amount);
    }
}