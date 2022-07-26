<?php

namespace Realodix\Dessert\Support;

/**
 * @internal
 */
final class Validator
{
    /**
     * Check if a string is valid JSON
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
     */
    public static function actualValue(mixed $actualValue, string $type)
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

        return self::parameterType($type, $actualValue, $invalidArgument);
    }

    /**
     * Determines whether the expected value given is valid or invalid
     */
    public static function expectedValue(mixed $expectedValue, string $type, int $argument = 1)
    {
        $stack = debug_backtrace();
        $typeGiven = $type;

        if ($type === 'class') {
            $typeGiven = 'class or interface name';
        }

        $invalidArgument = sprintf(
            'Argument #%d of %s() must be %s %s, %s given',
            $stack[1]['function'],
            $argument,
            \in_array(lcfirst($type)[0], ['a', 'e', 'i', 'o', 'u'], true) ? 'an' : 'a',
            $typeGiven,
            get_debug_type($expectedValue)
        );
        // Argument #1 of PHPUnit\Framework\Assert::assertNotInstanceOf() must be a class or interface name
        return self::parameterType($type, $expectedValue, $invalidArgument);
    }

    public static function parameterType($types, $value, $name)
    {
        if (is_string($types)) {
            $types = explode('|', $types);
        }

        if (! self::hasType($value, $types)) {
            throw new \InvalidArgumentException($name);
        }

        return $value;
    }

    private static function hasType(mixed $value, array $allowedTypes): bool
    {
        $type = gettype($value);

        if (in_array($type, $allowedTypes)) {
            return true;
        }

        if (in_array('class', $allowedTypes) && (class_exists($value) || interface_exists($value))) {
            return true;
        }

        if (in_array('iterable', $allowedTypes) && is_iterable($value)) {
            return true;
        }

        return false;
    }
}
