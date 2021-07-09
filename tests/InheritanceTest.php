<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Framework\TestCase;
use Realodix\NextProject\Assert;

final class InheritanceTest extends TestCase
{
    /** @test */
    public function canBeExtended(): void
    {
        $myAssert = new MyAssert;

        $myAssert->success();

        (new MyAssert('this also'))->notEquals('works');

        ass(new MyAssert())->instanceOf(Assert::class);
    }
}

final class MyAssert extends Assert
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
