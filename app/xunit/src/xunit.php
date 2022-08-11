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

    public function tearDown(): void
    {
    }

    public function run(): void
    {
        $this->setUp();
        call_user_func([$this, $this->name]);
        $this->tearDown();
    }
}

class WasRun extends TestCase
{
    private string $log;

    public function setUp(): void
    {
        $this->log = "setUp ";
    }

    public function testMethod(): void
    {
        $this->log = $this->log . "testMethod ";
    }

    public function tearDown(): void
    {
        $this->log = $this->log . "tearDown ";
    }

    public function log(): string
    {
        return $this->log;
    }
}

class TestCaseTest extends TestCase
{
    public function testTemplateMethod()
    {
        $test = new WasRun("testMethod");
        $test->run();
        assert("setUp testMethod tearDown " === $test->log(), "テストメソッド実行後はsetUpとtestMethodとtearDownのログが出力されなければなりません");
    }
}

ini_set('assert.active', '1');
ini_set('assert.exception', '1');

(new TestCaseTest("testTemplateMethod"))->run();