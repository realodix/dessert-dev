<?php

namespace Realodix\NextProject\Support\Constraint;

use PHPUnit\Framework\Constraint\Constraint;

/**
 * For internal use only to support older PHPUnit
 *
 * Reference:
 * - https://github.com/sebastianbergmann/phpunit/blob/master/src/Framework/Constraint/String/StringEqualsStringIgnoringLineEndings.php
 *
 * @internal
 * @codeCoverageIgnore
 */
final class StringEqualsStringIgnoringLineEndings extends Constraint
{
    /**
     * @var string
     */
    private $string;

    public function __construct(string $string)
    {
        $this->string = $this->normalizeLineEndings($string);
    }

    /**
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
        return sprintf(
            'is equal to "%s" ignoring line endings',
            $this->string
        );
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param mixed $other
     */
    protected function matches($other): bool
    {
        return (string) $this->string === $this->normalizeLineEndings((string) $other);
    }

    private function normalizeLineEndings(string $string): string
    {
        return strtr(
            $string,
            [
                "\r\n" => "\n",
                "\r"   => "\n",
            ]
        );
    }
}
