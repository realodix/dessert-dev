<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Framework\TestCase;
use Realodix\NextProject\Assert\AssertAbstract;

final class InheritanceTest extends TestCase
{
    /** @test */
    public function canBeExtended(): void
    {
        $myVerify = new MyVerify;

        $myVerify->success();

        $myVerify::Any('this also')->notEquals('works');

        ass(new MyVerify())->instanceOf(AssertAbstract::class);
    }
}

final class MyVerify extends AssertAbstract
{
    public function __construct($actual = null)
    {
        parent::__construct($actual);
    }

    public function success(string $message = '')
    {
        PHPUnit::assertTrue(true, $message);
    }
}
