<?php

namespace Realodix\NextProject\Test\Features;

use PHPUnit\Framework\TestCase;

final class OppositeTest extends TestCase
{
    /**
     * Not property calls
     */
    public function testnotPropertyCalls(): void
    {
        expect(true)
            ->true()
            ->not()->false()
            ->not->false
            ->and(false)
            ->false();
    }
}
