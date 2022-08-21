<?php

declare(strict_types=1);

class TestResult
{
    private int $runCount;
    private int $errorCount;

    public function __construct()
    {
        $this->runCount = 0;
        $this->errorCount = 0;
    }

    public function testStarted(): void
    {
        $this->runCount = $this->runCount + 1;
    }

    public function testFailed(): void
    {
        $this->errorCount = $this->errorCount + 1;
    }

    public function summary(): string
    {
        return sprintf("%d run, %d failed", $this->runCount, $this->errorCount);
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
        try {
            call_user_func([$this, $this->name]);
        } catch (Exception $e) {
            $result->testFailed();
        }
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
        $result = $test->run();
        echo $result->summary() . PHP_EOL;
        assert("setUp testMethod tearDown " === $test->log(), "テストメソッド実行後はsetUpとtestMethodとtearDownのログが出力されなければなりません");
    }

    public function testResult()
    {
        $test = new WasRun("testMethod");
        $result = $test->run();
        echo $result->summary() . PHP_EOL;
        assert("1 run, 0 failed" === $result->summary(), "テストメソッドを1つ実行した後は実行結果サマリーに1テスト実行と失敗なしが記録されていなければなりません");
    }

    public function testFailedResult()
    {
        $test = new WasRun("testBrokenMethod");
        $result = $test->run();
        echo $result->summary() . PHP_EOL;
        assert("1 run, 1 failed" === $result->summary(), "失敗になるテストメソッドを1つ実行した後は実行結果サマリーに1テスト実行と1テスト失敗が記録されていなければなりません");
    }

    public function testFailedResultFormatting()
    {
        $result = new TestResult();
        $result->testStarted();
        $result->testFailed();
        echo $result->summary() . PHP_EOL;
        assert("1 run, 1 failed" === $result->summary(), "テスト失敗の処理をした後は実行結果サマリーに1テスト実行と1テスト失敗が記録されていなければなりません");
    }

    public function testSuite()
    {
        $suite = new TestSuite();
        $suite->add(new WasRun("testMethod"));
        $suite->add(new WasRun("testBrokenMethod"));
        $result = $suite->run();
        echo $result->summary() . PHP_EOL;
        assert("2 run, 1 failed" === $result->summary(), "成功するテストと失敗するテストで構成されたテストスイートを実行した後、実行結果サマリーに2テスト実行と1テスト失敗が記録されていなければなりません");
    }
}

ini_set('assert.active', '1');
ini_set('assert.exception', '1');

(new TestCaseTest("testTemplateMethod"))->run();
(new TestCaseTest("testResult"))->run();
(new TestCaseTest("testFailedResult"))->run();
(new TestCaseTest("testFailedResultFormatting"))->run();
(new TestCaseTest("testSuite"))->run();