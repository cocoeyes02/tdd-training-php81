<?php

declare(strict_types=1);

class TestCase
{
    public readonly string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function run(): void
    {
        call_user_func([$this, $this->name]);
    }
}

class WasRun extends TestCase
{
    public ?int $wasRun;

    public function __construct(string $name)
    {
        $this->wasRun = null;
        parent::__construct($name);
    }

    public function testMethod(): void
    {
        $this->wasRun = 1;
    }
}

ini_set('assert.active', '1');
ini_set('assert.exception', '1');

$test = new WasRun("testMethod");
assert(is_null($test->wasRun), "テストメソッドを実行する前は実行前のステータスでなければなりません");
$test->run();
assert($test->wasRun === 1, "テストメソッド実行後は実行後のステータスでなければなりません");