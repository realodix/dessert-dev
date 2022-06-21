<?php

namespace Realodix\NextProject\Test\Custom;

use PHPUnit\Framework\TestCase;

final class PestExpectationsTest extends TestCase
{
    public function testToBe(): void
    {
        expect('string')->toBe('string');
    }

    public function testToBeTrue(): void
    {
        expect(true)->toBeTrue();
    }

    public function testToBeFalse(): void
    {
        expect(false)->toBeFalse();
    }
}
