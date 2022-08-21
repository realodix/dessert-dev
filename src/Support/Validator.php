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
     *
     * @return mixed
     */
    public static function actualValue(mixed $value, string $expectedType)
    {
        $stack = debug_backtrace();
        $typeGiven = str_replace('_', ' or ', $expectedType);

        if ($expectedType === 'class') {
            $typeGiven = 'class name';
        }

        $errorName = sprintf(
            '%s(): Actual value must be of type %s %s, %s given.',
            $stack[1]['function'],
            \in_array(lcfirst($expectedType)[0], ['a', 'e', 'i', 'o', 'u'], true) ? 'an' : 'a',
            $typeGiven,
            get_debug_type($value)
        );

        return self::parameterType($expectedType, $value, $errorName);
    }

    /**
     * Determines whether the expected value given is valid or invalid
     *
     * @return mixed
     */
    public static function expectedValue(mixed $value, string $expectedType, int $argument = 1)
    {
        $stack = debug_backtrace();
        $typeGiven = $expectedType;

        if ($expectedType === 'class') {
            $typeGiven = 'class or interface name';
        }

        $errorName = sprintf(
            'Argument #%d of %s() must be %s %s, %s given',
            $stack[1]['function'],
            $argument,
            \in_array(lcfirst($expectedType)[0], ['a', 'e', 'i', 'o', 'u'], true) ? 'an' : 'a',
            $typeGiven,
            get_debug_type($value)
        );

        // Argument #1 of PHPUnit\Framework\Assert::assertNotInstanceOf() must be a class or interface name
        return self::parameterType($expectedType, $value, $errorName);
    }

    /**
     * @return mixed
     *
     * @throws \InvalidArgumentException
     */
    public static function parameterType(string $types, mixed $value, string $errorName)
    {
        $types = explode('|', $types);

        if (! self::hasType($value, $types)) {
            throw new \InvalidArgumentException($errorName);
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

        if (in_array('ArrayAccess', $allowedTypes) && $value instanceof \ArrayAccess) {
            return true;
        }

        if (
            in_array('Countable', $allowedTypes)
            && $value instanceof \Countable
            && $value instanceof \ResourceBundle
            && $value instanceof \SimpleXMLElement
        ) {
            return true;
        }

        return false;
    }
}
