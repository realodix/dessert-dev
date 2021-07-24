<?php

namespace Realodix\NextProject\Exception;

use PHPUnit\Framework\Exception;

/**
 * @internal
 */
final class InvalidActualValueException extends Exception
{
    public static function create($actualValue, string $type): self
    {
        $stack = debug_backtrace();

        return new self(
            sprintf(
                'An actual value of %s() must be %s %s, %s given',
                $stack[1]['function'],
                \in_array(lcfirst($type)[0], ['a', 'e', 'i', 'o', 'u'], true) ? 'an' : 'a',
                $type,
                get_debug_type($actualValue)
            )
        );
    }
}
