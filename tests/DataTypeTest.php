<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;

final class DataTypeTest extends TestCase
{
    /** @test */
    public function isArray(): void
    {
        ass([1, 2, 3])->isArray();
        ass(false)->isNotArray();
    }

    /** @test */
    public function isBool(): void
    {
        ass(false)->isBool();
        ass([1, 2, 3])->isNotBool();
    }

    /** @test */
    public function isCallable(): void
    {
        ass(function (): void {
        })->isCallable();

        ass(false)->isNotCallable();
    }

    /** @test */
    public function isClosedResource(): void
    {
        $resource = fopen(__FILE__, 'r');
        fclose($resource);

        ass($resource)->isClosedResource();
    }

    /** @test */
    public function isFloat(): void
    {
        ass(1.5)->isFloat();
        ass(1)->isNotFloat();
    }

    /** @test */
    public function isInt(): void
    {
        ass(5)->isInt();
        ass(1.5)->isNotInt();
    }

    /** @test */
    public function isIterable(): void
    {
        ass([])->isIterable();
    }

    /** @test */
    public function isNotClosedResource(): void
    {
        ass(null)->isNotClosedResource();
    }

    /** @test */
    public function isNotIterable(): void
    {
        ass(null)->isNotIterable();
    }

    /** @test */
    public function isNumeric(): void
    {
        ass('1.5')->isNumeric();
        ass('foo bar')->isNotNumeric();
    }

    /** @test */
    public function isObject(): void
    {
        ass(new \stdClass)->isObject();
        ass(false)->isNotObject();
    }

    /** @test */
    public function isResource(): void
    {
        ass(fopen(__FILE__, 'r'))->isResource();
        ass('false')->isNotResource();
    }

    /** @test */
    public function isScalar(): void
    {
        ass('foo bar')->isScalar();
        ass([1, 2, 3])->isNotScalar();
    }

    /** @test */
    public function isString(): void
    {
        ass('foo bar')->isString();
        ass(false)->isNotString();
    }

    /** @test */
    public function trueFalseNull(): void
    {
        ass(true)->true();
        ass(true)->true('something should be true');
        ass(false)->notTrue();

        ass(false)->false();
        ass(false)->false('something should be false');
        ass(true)->notFalse();

        ass(null)->null();
        ass(true)->notNull();
    }
}
