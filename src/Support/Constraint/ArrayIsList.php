<?php

namespace Realodix\NextProject\Support\Constraint;

use PHPUnit\Framework\Constraint\Constraint;

/**
 * For internal use only to support older PHPUnit
 *
 * Reference:
 * - https://github.com/sebastianbergmann/phpunit/blob/master/src/Framework/Constraint/Traversable/ArrayIsList.php
 * - https://github.com/sebastianbergmann/phpunit/pull/4818
 *
 * @internal
 * @codeCoverageIgnore
 */
final class ArrayIsList extends Constraint
{
    /**
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
        return 'is list';
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param mixed $other
     */
    protected function matches($other): bool
    {
        if (! \is_array($other)) {
            return false;
        }

        // symfony/polyfill-php81
        return array_is_list($other);
    }

    /**
     * Returns the description of the failure.
     *
     * The beginning of failure messages is "Failed asserting that" in most
     * cases. This method should return the second part of that sentence.
     *
     * @param mixed $other
     */
    protected function failureDescription($other): string
    {
        return 'an array '.$this->toString();
    }
}
