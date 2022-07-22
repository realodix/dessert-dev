<?php

namespace Realodix\Dessert\Test;

use PHPUnit\Framework\TestCase;
use Realodix\Dessert\Test\Fixtures\CustomAssert;
use Realodix\Dessert\{Assert, Assertion, Check};

final class GeneralTest extends TestCase
{
    public function testVariantsStaticClass(): void
    {
        Assert::that(true)
            ->true()
            ->notFalse();

        Check::that(true)
            ->true()
            ->notFalse();
    }

    public function testAndMethod(): void
    {
        ass(1)->isInt
            ->and(true)->true;
    }

    /** @test */
    public function canBeExtended(): void
    {
        $myAssert = new CustomAssert;

        $myAssert->success('it works!');
        Assert::that('this also')->notEquals('works');

        ass(new CustomAssert)->instanceOf(Assertion::class);
    }
}
