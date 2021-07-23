<?php

namespace Realodix\NextProject\Exception;

/**
 * @internal
 */
final class InvalidArgumentException extends \PHPUnit\Framework\Exception
{
    public static function create(int $argument, string $type): self
    {
        $stack = debug_backtrace();

        return new self(
            sprintf(
                'Argument #%d of %s::%s() must be %s %s',
                $argument,
                $stack[1]['class'],
                $stack[1]['function'],
                \in_array(lcfirst($type)[0], ['a', 'e', 'i', 'o', 'u'], true) ? 'an' : 'a',
                $type
            )
        );
    }

    private function __construct(string $message = '', int $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
