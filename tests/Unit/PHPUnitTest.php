<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\TestCase;
use Realodix\NextProject\Test\Fixtures\ObjectEquals\ValueObject;

final class PHPUnitTest extends TestCase
{
    public function testClassHasAttribute(): void
    {
        ass('Exception')
            ->classHasAttribute('message')
            ->classNotHasAttribute('fakeproperty');

        if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
            $testObject = (object) ['existingAttribute' => true];
            ass($testObject)->objectNotHasAttribute('fakeproperty');
            ass($testObject)->objectHasAttribute('existingAttribute');
        }
    }

    public function testClassHasStaticAttribute(): void
    {
        ass(FakeClassForTesting::class)
            ->classHasStaticAttribute('staticProperty')
            ->classNotHasStaticAttribute('fakeProperty');
    }

    public function testContainsOnlyInstancesOf(): void
    {
        $array = [
            new FakeClassForTesting(),
            new FakeClassForTesting(),
            new FakeClassForTesting(),
        ];

        ass($array)->containsOnlyInstancesOf(FakeClassForTesting::class);
    }

    public function testInstanceOf(): void
    {
        $testClass = new \DateTime();

        ass($testClass)
            ->instanceOf('DateTime')
            ->notInstanceOf('DateTimeZone');
    }

    /**
     * Two objects can be asserted to be equal using comparison method.
     */
    public function testObjectEquals(): void
    {
        ass(new ValueObject(1))->objectEquals(new ValueObject(1));

        try {
            ass(new ValueObject(2))->objectEquals(new ValueObject(1));
        } catch (AssertionFailedError $e) {
            return;
        }

        $this->fail();
    }
}

class FakeClassForTesting
{
    public static $staticProperty;
}
