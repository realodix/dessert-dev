<?php

namespace Realodix\Dessert\Test\Fixtures;

use PHPUnit\Framework\Assert;
use Realodix\Dessert\Assertion;

final class CustomAssert extends Assertion
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
