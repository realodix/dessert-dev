<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;

final class TrueFalseNullEmptyTest extends TestCase
{
    public function testEmpty(): void
    {
        ass([])->empty();
        ass(['3', '5'])->notEmpty();
    }

    public function testFalse(): void
    {
        ass(false)->false();
        ass(true)->notFalse();
    }

    public function testNull(): void
    {
        ass(null)->null();
        ass(true)->notNull();
    }

    public function testTrue(): void
    {
        ass(true)->true();
        ass(false)->notTrue();
    }
}
