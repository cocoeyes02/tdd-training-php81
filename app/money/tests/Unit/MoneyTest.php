<?php

declare(strict_types=1);

namespace Money\Tests\Unit;

use Money\Money;
use Money\Tests\TestCase;

class MoneyTest extends TestCase
{
    public function testMultiplication()
    {
        $five = Money::dollar(5);
        $this->assertObjectEquals(Money::dollar(10), $five->times(2));
        $this->assertObjectEquals(Money::dollar(15), $five->times(3));
    }

    public function testEquality()
    {
        $this->assertTrue((Money::dollar(5))->equals(Money::dollar(5)));
        $this->assertFalse((Money::dollar(5))->equals(Money::dollar(6)));
        $this->assertFalse((Money::franc(5))->equals(Money::dollar(5)));
    }

    public function testCurrency()
    {
        $this->assertSame("USD", Money::dollar(1)->currency());
        $this->assertSame("CHF", Money::franc(1)->currency());
    }

    public function testSimpleAddition()
    {
        $sum = Money::dollar(5)->plus(Money::dollar(5));
        $this->assertObjectEquals(Money::dollar(10), $sum);
    }
}