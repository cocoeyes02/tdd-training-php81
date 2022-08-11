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
    private ?int $wasRun;
    private string $log;

    public function setUp(): void
    {
        $this->wasRun = null;
        $this->log = "setUp ";
    }

    public function testMethod(): void
    {
        $this->wasRun = 1;
    }

    public function wasRun(): ?int
    {
        return $this->wasRun;
    }

    public function log(): string
    {
        return $this->log;
    }
}

class TestCaseTest extends TestCase
{
    private WasRun $test;

    public function setUp(): void
    {
        $this->test = new WasRun("testMethod");
    }

    public function testRunning()
    {
        $this->test->run();
        assert($this->test->wasRun() === 1, "テストメソッド実行後は実行後のステータスでなければなりません");
    }

    public function testSetUp()
    {
        $this->test->run();
        assert("setUp " === $this->test->log(), "テストメソッド実行後はsetUpのログが出力されなければなりません");
    }
}

ini_set('assert.active', '1');
ini_set('assert.exception', '1');

(new TestCaseTest("testRunning"))->run();
(new TestCaseTest("testSetUp"))->run();