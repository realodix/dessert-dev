<?php

namespace Realodix\NextProject\Test;

use Exception;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;

final class AssertThrowTest extends TestCase
{
    /** @test */
    public function doesNotThrow(): void
    {
        $func = function (): void {
            throw new Exception('foo');
        };

        ass(function (): void {
        })->doesNotThrow();

        ass($func)->doesNotThrow(\RuntimeException::class);
        ass($func)->doesNotThrow(\RuntimeException::class, 'bar');
        ass($func)->doesNotThrow(\RuntimeException::class, 'foo');
        ass($func)->doesNotThrow(new \RuntimeException());
        ass($func)->doesNotThrow(new \RuntimeException('bar'));
        ass($func)->doesNotThrow(new \RuntimeException('foo'));
        ass($func)->doesNotThrow(Exception::class, 'bar');
        ass($func)->doesNotThrow(new Exception('bar'));

        ass(function () use ($func): void {
            ass($func)->doesNotThrow();
        })->throws(new ExpectationFailedException('exception was not expected to be thrown'));

        ass(function () use ($func): void {
            ass($func)->doesNotThrow(Exception::class);
        })->throws(new ExpectationFailedException("exception 'Exception' was not expected to be thrown"));

        ass(function () use ($func): void {
            ass($func)->doesNotThrow(Exception::class, 'foo');
        })->throws(new ExpectationFailedException("exception 'Exception' with message 'foo' was not expected to be thrown"));
    }

    /** @test */
    public function throws(): void
    {
        $func = function (): void {
            throw new Exception('foo');
        };

        ass($func)->throws();
        ass($func)->throws(Exception::class);
        ass($func)->throws(Exception::class, 'foo');
        ass($func)->throws(new Exception());
        ass($func)->throws(new Exception('foo'));

        ass(function () use ($func): void {
            ass($func)->throws(\RuntimeException::class);
        })->throws(ExpectationFailedException::class);

        ass(function (): void {
            ass(function (): void {
            })->throws(Exception::class);
        })->throws(new ExpectationFailedException("exception 'Exception' was not thrown as expected"));
    }
}
