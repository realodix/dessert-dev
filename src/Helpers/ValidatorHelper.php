<?php

namespace Realodix\NextProject\Helpers;

/**
 * @internal
 */
final class ValidatorHelper
{
    /**
     * Evaluates the constraint for parameter $other. Returns true if the constraint is
     * met, false otherwise.
     *
     * @param mixed $value
     */
    public static function isJson($value): bool
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
     * Check if a string is valid XML.
     * - https://stackoverflow.com/a/31240779/2732184
     * - https://github.com/mtvbrianking/laravel-xml/blob/master/src/Support/XmlValidator.php
     *
     * @param mixed $xml
     */
    public static function isXml($xml): bool
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
