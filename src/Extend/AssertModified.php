<?php

namespace Realodix\NextProject\Extend;

use PHPUnit\Framework\Assert;
use Realodix\NextProject\Support\Validator;

/**
 * Assertion in PHPUnit that got behavior changes.
 *
 * @internal
 */
final class AssertModified
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

    public static function stringEquals(string $expected, string $actual, string $message = '')
    {
        if (Validator::isJson($actual)) {
            return Assert::assertJsonStringEqualsJsonString($expected, $actual, $message);
        }

        if (Validator::isXml($actual)) {
            return Assert::assertXmlStringEqualsXmlString($expected, $actual, $message);
        }

        return Assert::assertEquals($expected, $actual, $message);
    }

    public static function stringNotEquals(string $expected, string $actual, string $message = '')
    {
        if (Validator::isJson($actual)) {
            return Assert::assertJsonStringNotEqualsJsonString($expected, $actual, $message);
        }

        if (Validator::isXml($actual)) {
            return Assert::assertXmlStringNotEqualsXmlString($expected, $actual, $message);
        }

        return Assert::assertNotEquals($expected, $actual, $message);
    }

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
