<?php

namespace Realodix\NextProject\Extend;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\Constraint\IsEqualIgnoringCase;
use PHPUnit\Framework\Constraint\LogicalNot;
use PHPUnit\Framework\Constraint\StringContains;
use PHPUnit\Runner\Version;
use Realodix\NextProject\Support\Str;

/**
 * Mixed assertions.
 *
 * @internal
 */
final class AssertMixed
{
    /**
     * Asserts that two strings equality ignoring line endings
     *
     * Reference:
     * - https://github.com/sebastianbergmann/phpunit/pull/4670
     *
     * @param string $expected
     * @param string $actual
     * @param string $message
     */
    public static function stringEqualIgnoringLineEndings(
        string $expected,
        string $actual,
        string $message = ''
    ) {
        $expected = Str::normalizeLineEndings($expected);
        $actual = Str::normalizeLineEndings($actual);

        return Assert::assertThat($actual, new IsEqual($expected), $message);
    }

    /**
     * Asserts that the contents of one file is equal to the string.
     *
     * Reference:
     * - https://github.com/sebastianbergmann/phpunit/pull/4649
     *
     * @param string $expectedString
     * @param string $actual
     * @param string $message
     */
    public static function fileEqualsString(
        string $expectedString,
        string $actual,
        string $message = ''
    ) {
        Assert::assertFileExists($actual, $message);

        $constraint = new IsEqual($expectedString);

        return Assert::assertThat(file_get_contents($actual), $constraint, $message);
    }

    public static function fileNotEqualsString(
        string $expectedString,
        string $actual,
        string $message = ''
    ) {
        Assert::assertFileExists($actual, $message);

        $constraint = new LogicalNot(new IsEqual($expectedString));

        return Assert::assertThat(file_get_contents($actual), $constraint, $message);
    }

    public static function fileEqualsStringIgnoringCase(
        string $expectedString,
        string $actual,
        string $message = ''
    ) {
        Assert::assertFileExists($actual, $message);

        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '9.0', '<')) {
            return Assert::assertThat(
                file_get_contents($actual),
                new IsEqual($expectedString, 0.0, 10, false, true),
                $message
            );
        }
        // @codeCoverageIgnoreEnd

        $constraint = new IsEqualIgnoringCase($expectedString);

        return Assert::assertThat(file_get_contents($actual), $constraint, $message);
    }

    public static function fileNotEqualsStringIgnoringCase(
        string $expectedString,
        string $actual,
        string $message = ''
    ) {
        Assert::assertFileExists($actual, $message);

        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '9.0', '<')) {
            $constraint = new LogicalNot(new IsEqual($expectedString, 0.0, 10, false, true));

            return Assert::assertThat(file_get_contents($actual), $constraint, $message);
        }
        // @codeCoverageIgnoreEnd

        $constraint = new LogicalNot(new IsEqualIgnoringCase($expectedString));

        return Assert::assertThat(file_get_contents($actual), $constraint, $message);
    }
}
