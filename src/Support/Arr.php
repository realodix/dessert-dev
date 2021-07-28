<?php

namespace Realodix\NextProject\Support;

/**
 * Credits: most of this class methods and implementations
 * belongs to the Arr helper of laravel/framework project
 * (https://github.com/laravel/framework).
 *
 * @internal
 */
final class Arr
{
    /**
     * @param array<mixed> $array
     * @param string|int   $key
     */
    public static function has(array $array, $key): bool
    {
        $key = (string) $key;

        if (\array_key_exists($key, $array)) {
            return true;
        }

        foreach (explode('.', $key) as $segment) {
            if (\is_array($array) && \array_key_exists($segment, $array)) {
                $array = $array[$segment];
            } else {
                return false;
            }
        }

        return true;
    }
}
