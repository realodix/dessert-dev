<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;

final class IsTypeTest extends TestCase
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

        ass(null)->isNotClosedResource();
        ass(['array'])->isNotClosedResource();
        ass(new \stdClass)->isNotClosedResource();

        // ResourceHelper test for code coverage
        (new \Realodix\NextProject\Helpers\ResourceHelper)
            ->isClosedResource($resource);
        (new \Realodix\NextProject\Helpers\ResourceHelper)
            ->isClosedResource(null);
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
        ass(false)->isNotResource();
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
}
