<?php

declare(strict_types=1);

class TestResult
{
    private int $runCount;

    public function __construct()
    {
        $this->runCount = 0;
    }

    public function testStarted()
    {
        $this->runCount = $this->runCount + 1;
    }

    public function summary(): string
    {
        return $this->runCount . " run, 0 failed";
    }
}

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

    public function run(): TestResult
    {
        $result = new TestResult();
        $result->testStarted();
        $this->setUp();
        call_user_func([$this, $this->name]);
        $this->tearDown();
        return $result;
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

    public function testBrokenMethod(): never
    {
        throw new Exception();
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

    public function testResult()
    {
        $test = new WasRun("testMethod");
        $result = $test->run();
        assert("1 run, 0 failed" === $result->summary(), "テストメソッドを1つ実行した後は実行結果サマリーに1テスト実行と失敗なしが記録されていなければなりません");
    }

    public function testFailedResult()
    {
        $test = new WasRun("testBrokenMethod");
        $result = $test->run();
        assert("1 run, 1 failed" === $result->summary(), "失敗になるテストメソッドを1つ実行した後は実行結果サマリーに1テスト実行と1テスト失敗が記録されていなければなりません");
    }
}

ini_set('assert.active', '1');
ini_set('assert.exception', '1');

(new TestCaseTest("testTemplateMethod"))->run();
(new TestCaseTest("testResult"))->run();
// (new TestCaseTest("testFailedResult"))->run();