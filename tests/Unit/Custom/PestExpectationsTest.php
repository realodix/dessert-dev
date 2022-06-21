<?php

namespace Realodix\NextProject\Test\Custom;

use PHPUnit\Framework\TestCase;

final class PestExpectationsTest extends TestCase
{
    public function testToBeTrue(): void
    {
        expect(true)->toBeTrue();
    }

    public function testToBeFalse(): void
    {
        expect(false)->toBeFalse();
    }
}
