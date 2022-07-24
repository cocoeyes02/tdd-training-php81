<?php

declare(strict_types=1);

namespace Money\Tests\Unit;

use Money\Dollar;
use Money\Franc;
use Money\Tests\TestCase;

class MoneyTest extends TestCase
{
    public function testMultiplication()
    {
        $five = new Dollar(5);
        $this->assertObjectEquals(new Dollar(10), $five->times(2));
        $this->assertObjectEquals(new Dollar(15), $five->times(3));
    }

    public function testEquality()
    {
        $this->assertTrue((new Dollar(5))->equals(new Dollar(5)));
        $this->assertFalse((new Dollar(5))->equals(new Dollar(6)));
    }

    public function testFrancMultiplication()
    {
        $five = new Franc(5);
        $this->assertObjectEquals(new Franc(10), $five->times(2));
        $this->assertObjectEquals(new Franc(15), $five->times(3));
    }
}