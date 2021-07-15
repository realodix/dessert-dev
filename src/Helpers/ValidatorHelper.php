<?php

namespace Realodix\NextProject\Helpers;

/**
 * @internal
 */
final class ValidatorHelper
{
    /**
     * Evaluates the constraint for parameter $other. Returns true if the constraint is
     * met, false otherwise.
     */
    public static function isJson(string $value): bool
    {
        if ($value === '') {
            return false;
        }

        json_decode($value);

        if (json_last_error()) {
            return false;
        }

        return true;
    }
}
