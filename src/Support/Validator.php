<?php

namespace Realodix\NextProject\Support;

/**
 * @internal
 */
final class Validator
{
    /**
     * Determines whether a variable represents a closed resource.
     *
     * @param mixed $value The variable being type checked
     *
     * @return bool
     */
    public static function isClosedResource($value): bool
    {
        // Introduced in PHP 8 as alternative for get_debug_type(). Thanks
        // symfony/polyfill-php80, it works for PHP < 7.2
        if (get_debug_type($value) === 'resource (closed)') {
            return true;
        }

        return false;
    }

    /**
     * Check if a string is valid JSON
     *
     * @param string $value
     *
     * @return bool
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

    /**
     * Check if a string is valid XML
     * - https://stackoverflow.com/a/31240779/2732184
     * - https://github.com/mtvbrianking/laravel-xml/blob/master/src/Support/XmlValidator.php
     *
     * @param string $xml
     *
     * @return bool
     */
    public static function isXml(string $xml): bool
    {
        $content = trim($xml);
        if (empty($content)) {
            return false;
        }

        // ignore html
        if (false !== stripos($content, '<!DOCTYPE html>')) {
            return false;
        }

        libxml_use_internal_errors(true);

        simplexml_load_string($content);

        $errors = libxml_get_errors();

        libxml_clear_errors();

        return empty($errors);
    }

    /**
     * Determines whether the actual value given is valid or invalid
     *
     * @param mixed  $actualValue
     * @param string $type
     */
    public static function actualValue($actualValue, string $type)
    {
        $stack = debug_backtrace();
        $typeGiven = str_replace('_', ' or ', $type);

        if ($type === 'class') {
            $typeGiven = 'class name';
        }

        $invalidArgument = sprintf(
            '%s(): Actual value must be of type %s %s, %s given.',
            $stack[1]['function'],
            \in_array(lcfirst($type)[0], ['a', 'e', 'i', 'o', 'u'], true) ? 'an' : 'a',
            $typeGiven,
            get_debug_type($actualValue)
        );

        switch ($type) {
            case 'array':
                if (! (\is_array($actualValue) || $actualValue instanceof \ArrayAccess)) {
                    throw new \TypeError($invalidArgument);
                }

                return $actualValue;
            case 'class':
                if (! class_exists($actualValue)) {
                    throw new \TypeError($invalidArgument);
                }

                return $actualValue;
            case 'iterable':
                if (! is_iterable($actualValue)) {
                    throw new \TypeError($invalidArgument);
                }

                return $actualValue;
            case 'iterable_countable':
                if (! is_iterable($actualValue) && ! $actualValue instanceof \Countable) {
                    throw new \TypeError($invalidArgument);
                }

                return $actualValue;
            case 'object':
                if (! \is_object($actualValue)) {
                    throw new \TypeError($invalidArgument);
                }

                return $actualValue;
            case 'string':
                if (! \is_string($actualValue)) {
                    throw new \TypeError($invalidArgument);
                }

                return $actualValue;
        }
    }

    /**
     * Determines whether the expected value given is valid or invalid
     *
     * @param mixed  $expectedValue
     * @param int    $argument
     * @param string $type
     */
    public static function expectedValue($expectedValue, int $argument, string $type)
    {
        $stack = debug_backtrace();
        $typeGiven = str_replace('_', ' or ', $type);

        if ($type === 'class') {
            $typeGiven = 'class or interface name';
        }

        $invalidArgument = sprintf(
            '%s(): Argument #%d must be of type %s %s, %s given',
            $stack[1]['function'],
            $argument,
            \in_array(lcfirst($type)[0], ['a', 'e', 'i', 'o', 'u'], true) ? 'an' : 'a',
            $typeGiven,
            get_debug_type($expectedValue)
        );

        switch ($type) {
            case 'class':
                if (! class_exists($expectedValue) && ! interface_exists($expectedValue)) {
                    throw new \TypeError($invalidArgument);
                }

                return $expectedValue;
            case 'int_string':
                if (! (\is_int($expectedValue) || \is_string($expectedValue))) {
                    throw new \TypeError($invalidArgument);
                }

                return $expectedValue;
            case 'iterable_countable':
                if (! $expectedValue instanceof \Countable && ! is_iterable($expectedValue)) {
                    throw new \TypeError($invalidArgument);
                }

                return $expectedValue;
            case 'object':
                if (! \is_object($expectedValue)) {
                    throw new \TypeError($invalidArgument);
                }

                return $expectedValue;
        }
    }
}
