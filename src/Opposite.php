<?php

namespace Realodix\Dessert;

use PHPUnit\Framework\ExpectationFailedException;
use SebastianBergmann\Exporter\Exporter;

/**
 * @internal
 */
final class Opposite
{
    /**
     * Creates a new opposite expectation.
     */
    public function __construct(private Assertion $original)
    {
    }

    /**
     * Handle dynamic method calls into the original expectation.
     */
    public function __call(string $name, array $arguments): Assertion
    {
        try {
            $this->original->{$name}(...$arguments);
        } catch (ExpectationFailedException) {
            return $this->original;
        }

        $this->throwExpectationFailedException($name, $arguments);
    }

    /**
     * Handle dynamic properties gets into the original expectation.
     */
    public function __get(string $name): Assertion
    {
        try {
            $this->original->{$name};
        } catch (ExpectationFailedException) {
            return $this->original;
        }

        $this->throwExpectationFailedException($name);
    }

    /**
     * Creates a new expectation failed exception with a nice readable message.
     */
    private function throwExpectationFailedException(string $name, array $arguments = []): void
    {
        $exporter = new Exporter;

        $toString = function ($argument) use ($exporter): string {
            return $exporter->shortenedExport($argument);
        };

        throw new ExpectationFailedException(
            sprintf(
                'Failed asserting that %s is not %s %s.',
                $toString($this->original->actual),
                strtolower((string) preg_replace('/(?<!\ )[A-Z]/', ' $0', $name)),
                implode(' ', array_map(fn ($argument): string => $toString($argument), $arguments))
            )
        );
    }
}
