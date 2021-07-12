<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use Realodix\NextProject\Assertion;

final class InheritanceTest extends TestCase
{
    /** @test */
    public function canBeExtended(): void
    {
        $myAssert = new MyAssert;

        $myAssert->success();

        (new MyAssert('this also'))->notEquals('works');

        ass(new MyAssert())->instanceOf(Assertion::class);
    }
}

final class MyAssert extends Assertion
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
