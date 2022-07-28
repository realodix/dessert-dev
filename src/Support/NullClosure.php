<?php

namespace Realodix\Dessert\Support;

/**
 * @internal
 */
final class NullClosure
{
    /**
     * Creates a nullable closure.
     */
    public static function create(): \Closure
    {
        return \Closure::fromCallable(
            function (): void {
            }
        );
    }
}
