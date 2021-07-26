<?php

namespace Realodix\NextProject\Extend;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\Constraint\IsEqualIgnoringCase;
use PHPUnit\Framework\Constraint\LogicalNot;
use PHPUnit\Runner\Version;

/**
 * Mixed assertions.
 *
 * @internal
 */
final class AssertMixed
{
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
