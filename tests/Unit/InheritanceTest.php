<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;
use Realodix\NextProject\Assert;
use Realodix\NextProject\Assertion;
use Realodix\NextProject\Test\Fixtures\CustomAssert;

final class InheritanceTest extends TestCase
{
    /** @test */
    public function canBeExtended(): void
    {
        $myAssert = new CustomAssert;

        $myAssert->success('it works!');
        Assert::that('this also')->notEquals('works');

        ass(new CustomAssert())->instanceOf(Assertion::class);
    }
}