<?php

namespace Realodix\NextProject\Exception;

use PHPUnit\Framework\Exception;

/**
 * @internal
 */
final class InvalidActualValueException extends Exception
{
    public function __construct(string $message = '', int $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public static function create(string $type): self
    {
        $stack = debug_backtrace();

        return new self(
            sprintf(
                'An ACTUAL value of %s::%s() must be %s %s',
                $stack[1]['class'],
                $stack[1]['function'],
                \in_array(lcfirst($type)[0], ['a', 'e', 'i', 'o', 'u'], true) ? 'an' : 'a',
                $type
            )
        );
    }
}
