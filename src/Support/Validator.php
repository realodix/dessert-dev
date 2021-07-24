<?php

namespace Realodix\NextProject\Support;

/**
 * @internal
 */
final class Validator
{
    public static function actualValueCheck($actualValue, $type)
    {
        $stack = debug_backtrace();

        $invalidArgument = sprintf(
            'An actual value of %s() must be %s %s, %s given.',
            $stack[1]['function'],
            \in_array(lcfirst($type)[0], ['a', 'e', 'i', 'o', 'u'], true) ? 'an' : 'a',
            $type,
            get_debug_type($actualValue)
        );

        switch ($type) {
            case 'array':
                if (! (\is_array($actualValue) || $actualValue instanceof \ArrayAccess)) {
                    throw new \InvalidArgumentException($invalidArgument);
                }

                return $actualValue;
                break;
        }
    }

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
}
