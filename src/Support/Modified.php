<?php

namespace Realodix\NextProject\Support;

use PHPUnit\Framework\Assert;

/**
 * Assertion in PHPUnit that got behavior changes.
 *
 * @internal
 */
final class Modified
{
    public static function assertContains($needle, $haystack, string $message = '')
    {
        if (\is_string($haystack)) {
            return Assert::assertStringContainsString($needle, $haystack, $message);
        }

        return Assert::assertContains($needle, $haystack, $message);
    }

    public static function assertNotContains($needle, $haystack, string $message = '')
    {
        if (\is_string($haystack)) {
            return Assert::assertStringNotContainsString($needle, $haystack, $message);
        }

        return Assert::assertNotContains($needle, $haystack, $message);
    }

    /**
     * @param string $expectedFile
     * @param string $actualString
     * @param string $message
     */
    public static function assertStringEqualsFile(string $expectedFile, string $actualString, string $message = '')
    {
        if (Validator::isJson($actualString)) {
            return Assert::assertJsonStringEqualsJsonFile($expectedFile, $actualString, $message);
        }

        if (Validator::isXml($actualString)) {
            return Assert::assertXmlStringEqualsXmlFile($expectedFile, $actualString, $message);
        }

        return Assert::assertStringEqualsFile($expectedFile, $actualString, $message);
    }

    /**
     * @param string $expectedFile
     * @param string $actualString
     * @param string $message
     */
    public static function assertStringNotEqualsFile(string $expectedFile, string $actualString, string $message = '')
    {
        if (Validator::isJson($actualString)) {
            return Assert::assertJsonStringNotEqualsJsonFile($expectedFile, $actualString, $message);
        }

        if (Validator::isXml($actualString)) {
            return Assert::assertXmlStringNotEqualsXmlFile($expectedFile, $actualString, $message);
        }

        return Assert::assertStringNotEqualsFile($expectedFile, $actualString, $message);
    }
}
