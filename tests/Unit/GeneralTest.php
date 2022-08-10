<?php

namespace Realodix\Dessert\Test;

use PHPUnit\Framework\TestCase;
use Realodix\Dessert\Assert;
use Realodix\Dessert\Check;
use Realodix\Dessert\Test\Fixtures\CustomAssert;

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

        ass($this->getMockBuilder(\Exception::class)->getMock())
            ->instanceOf(\Exception::class);
    }
}
