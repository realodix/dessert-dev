<?php

namespace Realodix\NextProject\Support\Constraint;

use PHPUnit\Framework\Constraint\Constraint;

/**
 * For internal use only to support older PHPUnit
 *
 * Reference:
 * - https://github.com/sebastianbergmann/phpunit/blob/master/src/Framework/Constraint/Traversable/ArrayIsList.php
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
    protected function matches(mixed $other): bool
    {
        if (! \is_array($other)) {
            return false;
        }

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
    protected function failureDescription(mixed $other): string
    {
        return 'an array '.$this->toString();
    }
}
