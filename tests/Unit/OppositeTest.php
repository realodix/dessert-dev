<?php

namespace Realodix\Dessert\Test;

use PHPUnit\Framework\TestCase;

final class OppositeTest extends TestCase
{
    /**
     * Not property calls
     */
    public function testNotPropertyCalls(): void
    {
        verify(true)
            ->true()
            ->not()->false()
            ->not->false
            ->and(false)
            ->false();
    }
}
