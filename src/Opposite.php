<?php

namespace Realodix\Dessert;

use PHPUnit\Framework\ExpectationFailedException;
use SebastianBergmann\Exporter\Exporter;

/**
 * @internal
 *
 * @template TValue
 */
final class Opposite
{
    /**
     * @readonly
     * @var Assertion<TValue>
     */
    private $original;

    /**
     * Creates a new opposite expectation.
     *
     * @param Assertion<TValue> $original
     */
    public function __construct(Assertion $original)
    {
        $this->original = $original;
    }

    /**
     * Handle dynamic method calls into the original expectation.
     *
     * @param array<int, mixed> $arguments
     *
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function __call(string $name, array $arguments): Assertion
    {
        try {
            $this->original->{$name}(...$arguments);
        } catch (ExpectationFailedException $e) {
            return $this->original;
        }

        $this->throwExpectationFailedException($name, $arguments);
    }

    /**
     * Handle dynamic properties gets into the original expectation.
     *
     * @return Assertion<TValue>|Assertion<mixed>|never
     *
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function __get(string $name): Assertion
    {
        try {
            $this->original->{$name}; // @phpstan-ignore-line
        } catch (ExpectationFailedException) { // @phpstan-ignore-line
            return $this->original;
        }

        $this->throwExpectationFailedException($name);
    }

    /**
     * Creates a new expectation failed exception with a nice readable message.
     *
     * @param array<int, mixed> $arguments
     * @return never
     *
     * @throws \PHPUnit\Framework\ExpectationFailedException
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
