<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;
use Realodix\NextProject\Expect;

final class ExpectTest extends TestCase
{
    public function testExpectException(): void
    {
        Expect::exception(\Exception::class);
        $this->expectExceptionMessage('');

        throw new \Exception('');
    }
}
