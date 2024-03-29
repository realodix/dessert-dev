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
    public static function isJson(string $data): bool
    {
        if (! empty($data)) {
            @json_decode($data);

            return json_last_error() === JSON_ERROR_NONE;
        }

        return false;
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
        if (stripos($content, '<!DOCTYPE html>') !== false) {
            return false;
        }

        libxml_use_internal_errors(true);

        simplexml_load_string($content);

        $errors = libxml_get_errors();

        libxml_clear_errors();

        return empty($errors);
    }
}
