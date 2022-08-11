<?php

declare(strict_types=1);

class WasRun
{
    public ?int $wasRun;

    public function __construct($name)
    {
        $this->wasRun = null;
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
$test->testMethod();
assert($test->wasRun === 1, "テストメソッド実行後は実行後のステータスでなければなりません");