<?php

namespace Realodix\NextProject\Support;

/**
 * Credits: most of this class methods and implementations belongs to the Arr helper of
 * laravel/framework project (https://github.com/laravel/framework).
 *
 * @internal
 */
final class Arr
{
    /**
     * Flatten a multi-dimensional associative array with dots.
     *
     * @param array<array-key, mixed> $array
     *
     * @return array<int|string, mixed>
     */
    public static function dot(array $array, string $prepend = ''): array
    {
        $results = [];

        foreach ($array as $key => $value) {
            if (\is_array($value) && \count($value) > 0) {
                $results = array_merge($results, static::dot($value, $prepend.$key.'.'));
            } else {
                $results[$prepend.$value] = $value;
            }
        }

        return $results;
    }

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

    /**
     * @param array<mixed> $array
     * @param string|int   $key
     * @param null         $default
     *
     * @return array|mixed|null
     */
    public static function get(array $array, $key, $default = null)
    {
        $key = (string) $key;

        if (\array_key_exists($key, $array)) {
            return $array[$key];
        }

        if (strpos($key, '.') === false) {
            return $array[$key] ?? $default;
        }

        foreach (explode('.', $key) as $segment) {
            if (\is_array($array) && \array_key_exists($segment, $array)) {
                $array = $array[$segment];
            } else {
                return $default;
            }
        }

        return $array;
    }
}
