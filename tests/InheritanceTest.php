<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use Realodix\NextProject\Verify;

final class InheritanceTest extends TestCase
{
    public function testVerifyCanBeExtended(): void
    {
        $myVerify = new MyVerify;

        $myVerify->success();

        $myVerify::Any('this also')->notEquals('works');

        verify(new MyVerify())->instanceOf(Verify::class);
    }
}

final class MyVerify extends Verify
{
    public function __construct($actual = null)
    {
        parent::__construct($actual);
    }

    public function success(string $message = '')
    {
        Assert::assertTrue(true, $message);
    }
}
