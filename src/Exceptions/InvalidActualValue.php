<?php

namespace Realodix\Dessert\Exceptions;

/**
 * @internal
 */
final class InvalidActualValue extends \Exception
{
    public function __construct(string $type = '')
    {
        if ($type === '') {
            $type = sprintf('Invalid actual value type. Expected [%s].', $type);
        }

        parent::__construct($type);
    }
}
