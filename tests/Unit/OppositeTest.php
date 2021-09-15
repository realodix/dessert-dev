<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;

final class OppositeTest extends TestCase
{
    /**
     * Not property calls
     */
    public function testNotPropertyCalls(): void
    {
        ass(true)
            ->true()
            ->not()->false()
            ->not->false
            ->and(false)
            ->false();
    }
}
