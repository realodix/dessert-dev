<?php

namespace Realodix\Dessert\Test;

use PHPUnit\Framework\TestCase;
use Realodix\Dessert\Assert;
use Realodix\Dessert\Check;
use Realodix\Dessert\Test\Fixtures\CustomAssert;

final class GeneralTest extends TestCase
{
    public function testVariantsStaticClverify(): void
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
        verify(1)->isInt
            ->and(true)->true;
    }

    public function testCanBeExtended(): void
    {
        $myAssert = new CustomAssert;

        $myAssert->success('it works!');
        Assert::that('this also')->notEquals('works');

        verify($this->getMockBuilder(\Exception::class)->getMock())
            ->instanceOf(\Exception::class);
    }
}
