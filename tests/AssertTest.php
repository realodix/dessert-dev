<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;

final class AssertTest extends TestCase
{
    public function testEquals(): void
    {
        ass(5)->equals(5);
        ass('hello')->equals('hello');
        ass(5)->equals(5, 'user have 5 posts');
        ass(3.251)->equalsWithDelta(3.25, 0.01);
        ass(3.251)->equalsWithDelta(3.25, 0.01, 'respects delta');
    }

    public function testTrueFalseNull(): void
    {
        ass(true)->true();
        ass(false)->false();
        ass(null)->null();
        ass(true)->notNull();
        ass(false)->false('something should be false');
        ass(true)->true('something should be true');
    }
}
