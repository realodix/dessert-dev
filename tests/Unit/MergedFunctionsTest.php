<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;

final class MergedFunctionsTest extends TestCase
{
    public function testContains(): void
    {
        // Array
        ass([3, 2])->contains(3);
        ass([3, 2])->notContains(5, 'user have 5 posts');

        // String
        ass('foo bar')->contains('o b');
        ass('foo bar')->notContains('BAR');
    }
}
