<?php

namespace Realodix\Dessert\Support\Constraint;

use PHPUnit\Framework\Constraint\Constraint;

/**
 * For internal use only to support older PHPUnit
 *
 * Reference:
 * - https://github.com/sebastianbergmann/phpunit/blob/master/src/Framework/Constraint/Traversable/IsList.php
 * - https://github.com/sebastianbergmann/phpunit/pull/4818
 * - https://github.com/sebastianbergmann/phpunit/commit/e04a947baf8d9b800ac8a1223f3be0f090cacf3e
 *
 * @internal
 *
 * @codeCoverageIgnore
 */
final class IsList extends Constraint
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
