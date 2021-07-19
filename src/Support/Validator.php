<?php

namespace Realodix\NextProject\Support;

/**
 * @internal
 */
final class Validator
{
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
