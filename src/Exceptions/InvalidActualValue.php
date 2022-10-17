<?php

namespace Realodix\Dessert\Exceptions;

/**
 * @internal
 */
final class InvalidActualValue extends \Exception
{
    public function __construct(string $type = '', $customMessage = false)
    {
        if (! $customMessage) {
            $type = sprintf('Invalid actual value type. Expected %s.', $type);
        }

        parent::__construct($type);
    }
}
