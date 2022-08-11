<?php

declare(strict_types=1);

class TestCase
{
    public readonly string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function setUp(): void
    {
    }

    public function run(): void
    {
        $this->setUp();
        call_user_func([$this, $this->name]);
    }
}

class WasRun extends TestCase
{
    public ?int $wasRun;
    public ?int $wasSetUp;

    public function setUp(): void
    {
        $this->wasRun = null;
        $this->wasSetUp = 1;
    }

    public function testMethod(): void
    {
        $this->wasRun = 1;
    }
}

class TestCaseTest extends TestCase
{
    public function testRunning()
    {
        $test = new WasRun("testMethod");
        $test->run();
        assert($test->wasRun === 1, "テストメソッド実行後は実行後のステータスでなければなりません");
    }

    public function testSetUp()
    {
        $test = new WasRun("testMethod");
        $test->run();
        assert($test->wasSetUp, "テストメソッド実行後は準備完了のステータスでなければなりません");
    }
}

ini_set('assert.active', '1');
ini_set('assert.exception', '1');

(new TestCaseTest("testRunning"))->run();
(new TestCaseTest("testSetUp"))->run();