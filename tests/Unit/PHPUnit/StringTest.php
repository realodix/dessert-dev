<?php

namespace Realodix\NextProject\Test\PHPUnit;

use PHPUnit\Framework\TestCase;

final class StringTest extends TestCase
{
    public function testJson(): void
    {
        $json = json_encode(['foo' => 'bar']);

        ass($json)->json();
    }
}
