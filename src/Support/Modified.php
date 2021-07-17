<?php

namespace Realodix\NextProject\Support;

use PHPUnit\Framework\Assert as PHPUnit;

/**
 * Assertion in PHPUnit that got behavior changes.
 *
 * @internal
 */
final class Modified
{
    public static function assertContains($needle, $haystack, string $message = '')
    {
        if (is_string($haystack)) {
            return PHPUnit::assertStringContainsString($needle, $haystack, $message);
        }

        return PHPUnit::assertContains($needle, $haystack, $message);
    }

    public static function assertNotContains($needle, $haystack, string $message = '')
    {
        if (is_string($haystack)) {
            return PHPUnit::assertStringNotContainsString($needle, $haystack, $message);
        }

        return PHPUnit::assertNotContains($needle, $haystack, $message);
    }

    public static function assertStringEqualsFile(string $expectedFile, string $actualString, string $message = '')
    {
        if (Validator::isJson($actualString)) {
            return PHPUnit::assertJsonStringEqualsJsonFile($expectedFile, $actualString, $message);
        }

        if (Validator::isXml($actualString)) {
            return PHPUnit::assertXmlStringEqualsXmlFile($expectedFile, $actualString, $message);
        }

        return PHPUnit::assertStringEqualsFile($expectedFile, $actualString, $message);
    }

    public static function assertStringNotEqualsFile(string $expectedFile, string $actualString, string $message = '')
    {
        if (Validator::isJson($actualString)) {
            return PHPUnit::assertJsonStringNotEqualsJsonFile($expectedFile, $actualString, $message);
        }

        if (Validator::isXml($actualString)) {
            return PHPUnit::assertXmlStringNotEqualsXmlFile($expectedFile, $actualString, $message);
        }

        return PHPUnit::assertStringNotEqualsFile($expectedFile, $actualString, $message);
    }
}
