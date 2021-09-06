<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;
use Realodix\NextProject\Assert;
use Realodix\NextProject\Assertion;
use Realodix\NextProject\Check;
use Realodix\NextProject\Test\Fixtures\CustomAssert;

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

    public function testEachMethod(): void
    {
        ass([1, 2, 3, 4, 5])
            ->each->isInt;

        ass([function () {}, function () {}])
            ->each()->isCallable();
    }

    public function testNotMethod(): void
    {
        ass(true)
            ->true()
            ->not()->false()
            ->not->false;
    }

    /** @test */
    public function canBeExtended(): void
    {
        $myAssert = new CustomAssert;

        $myAssert->success('it works!');
        Assert::that('this also')->notEquals('works');

        ass(new CustomAssert())->instanceOf(Assertion::class);
    }
}
