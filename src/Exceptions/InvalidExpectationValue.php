<?php

namespace Realodix\Dessert\Exceptions;

/**
 * @internal
 */
final class InvalidExpectationValue extends \Exception
{
    public function __construct(string $type = '', bool $customMessage = false)
    {
        if (! $customMessage) {
            $type = sprintf('Invalid expectation value type. Expected %s.', $type);
        }

        parent::__construct($type);
    }
}
