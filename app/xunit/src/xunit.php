<?php

declare(strict_types=1);

ini_set('assert.active', '1');
ini_set('assert.exception', '1');

$test = new WasRun("testMethod");
assert(is_null($test->wasRun), "テストメソッドを実行する前は実行前のステータスでなければなりません");
$test->testMethod();
assert($test->wasRun === 1, "テストメソッド実行後は実行後のステータスでなければなりません");