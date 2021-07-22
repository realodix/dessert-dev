<?php

namespace Realodix\NextProject;

use PHPUnit\Framework\TestCase;
use PHPUnit\Runner\Version as PHPUnitVersion;

final class Expect
{
    /**
     * @var TestCase
     */
    private $exception;

    /**
     * @param TestCase $exception
     */
    private function __construct(TestCase $exception)
    {
        $this->exception = $exception;
    }

    public static function after(TestCase $exception)
    {
        return new self($exception);
    }

    public function exception(string $class = \Exception::class): self
    {
        $this->exception->expectException($class);

        return $this;
    }

    public function exceptionCode(int $code): self
    {
        $this->exception->expectExceptionCode($code);

        return $this;
    }

    public function exceptionMessage(string $message): self
    {
        $this->exception->expectExceptionMessage($message);

        return $this;
    }

    /**
     * Introduced in PHPUnit 8.4.0 to improve the name of the expectExceptionMessageRegExp()
     * method.
     *
     * expectExceptionMessageRegExp() status:
     * - Deprecated: PHPUnit 8.4.0
     * - Warning: PHPUnit 8.5.3
     * - Removed: PHPUnit 9.0.0
     *
     * @param string $regex
     */
    public function exceptionMessageMatches(string $regex): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '8.4', '<')) {
            $this->exception->expectExceptionMessageRegExp($regex);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        $this->exception->expectExceptionMessageMatches($regex);

        return $this;
    }

    /**
     * Introduced in PHPUnit 8.4.0 as alternatives to using expectException() et al for
     * expecting PHP native errors, warnings and notices.
     *
     * expectException*() for testing PHP native notices
     * - Deprecated: PHPUnit 8.4.0
     * - Warning: PHPUnit 9.0.0
     * - Removed: PHPUnit 10.0.0
     */
    public function deprecation(): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '8.4', '<')) {
            $this->exception->expectException('\PHPUnit\Framework\Error\Deprecated');

            return $this;
        }
        // @codeCoverageIgnoreEnd

        $this->exception->expectDeprecation();

        return $this;
    }

    /**
     * Introduced in PHPUnit 8.4.0 as alternatives to using expectException() et al for
     * expecting PHP native errors, warnings and notices.
     *
     * expectException*() for testing PHP native notices
     * - Deprecated: PHPUnit 8.4.0
     * - Warning: PHPUnit 9.0.0
     * - Removed: PHPUnit 10.0.0
     *
     * @param string $message
     */
    public function deprecationMessage(string $message): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '8.4', '<')) {
            $this->exception->expectExceptionMessage($message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        $this->exception->expectDeprecationMessage($message);

        return $this;
    }

    /**
     * Introduced in PHPUnit 8.4.0 as alternatives to using expectException() et al for
     * expecting PHP native errors, warnings and notices.
     *
     * expectException*() for testing PHP native notices
     * - Deprecated: PHPUnit 8.4.0
     * - Warning: PHPUnit 9.0.0
     * - Removed: PHPUnit 10.0.0
     *
     * @param string $regex
     */
    public function deprecationMessageMatches(string $regex): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '8.4', '<')) {
            $this->exception->expectExceptionMessageRegExp($regex);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        $this->exception->expectDeprecationMessageMatches($regex);

        return $this;
    }

    /**
     * Introduced in PHPUnit 8.4.0 as alternatives to using expectException() et al for
     * expecting PHP native errors, warnings and notices.
     *
     * expectException*() for testing PHP native notices
     * - Deprecated: PHPUnit 8.4.0
     * - Warning: PHPUnit 9.0.0
     * - Removed: PHPUnit 10.0.0
     */
    public function notice(): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '8.4', '<')) {
            $this->exception->expectException('\PHPUnit\Framework\Error\Notice');

            return $this;
        }
        // @codeCoverageIgnoreEnd

        $this->exception->expectNotice();

        return $this;
    }

    /**
     * Introduced in PHPUnit 8.4.0 as alternatives to using expectException() et al for
     * expecting PHP native errors, warnings and notices.
     *
     * expectException*() for testing PHP native notices
     * - Deprecated: PHPUnit 8.4.0
     * - Warning: PHPUnit 9.0.0
     * - Removed: PHPUnit 10.0.0
     *
     * @param string $message
     */
    public function noticeMessage(string $message): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '8.4', '<')) {
            $this->exception->expectExceptionMessage($message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        $this->exception->expectNoticeMessage($message);

        return $this;
    }

    /**
     * Introduced in PHPUnit 8.4.0 as alternatives to using expectException() et al for
     * expecting PHP native errors, warnings and notices.
     *
     * expectException*() for testing PHP native notices
     * - Deprecated: PHPUnit 8.4.0
     * - Warning: PHPUnit 9.0.0
     * - Removed: PHPUnit 10.0.0
     *
     * @param string $regex
     */
    public function noticeMessageMatches(string $regex): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '8.4', '<')) {
            $this->exception->expectExceptionMessageRegExp($regex);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        $this->exception->expectNoticeMessageMatches($regex);

        return $this;
    }

    /**
     * Introduced in PHPUnit 8.4.0 as alternatives to using expectException() et al for
     * expecting PHP native errors, warnings and notices.
     *
     * expectException*() for testing PHP native notices
     * - Deprecated: PHPUnit 8.4.0
     * - Warning: PHPUnit 9.0.0
     * - Removed: PHPUnit 10.0.0
     */
    public function warning(): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '8.4', '<')) {
            $this->exception->expectException('\PHPUnit\Framework\Error\Warning');

            return $this;
        }
        // @codeCoverageIgnoreEnd

        $this->exception->expectWarning();

        return $this;
    }

    /**
     * Introduced in PHPUnit 8.4.0 as alternatives to using expectException() et al for
     * expecting PHP native errors, warnings and notices.
     *
     * expectException*() for testing PHP native notices
     * - Deprecated: PHPUnit 8.4.0
     * - Warning: PHPUnit 9.0.0
     * - Removed: PHPUnit 10.0.0
     *
     * @param string $message
     */
    public function warningMessage(string $message): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '8.4', '<')) {
            $this->exception->expectExceptionMessage($message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        $this->exception->expectWarningMessage($message);

        return $this;
    }

    /**
     * Introduced in PHPUnit 8.4.0 as alternatives to using expectException() et al for
     * expecting PHP native errors, warnings and notices.
     *
     * expectException*() for testing PHP native notices
     * - Deprecated: PHPUnit 8.4.0
     * - Warning: PHPUnit 9.0.0
     * - Removed: PHPUnit 10.0.0
     *
     * @param string $regex
     */
    public function warningMessageMatches(string $regex): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '8.4', '<')) {
            $this->exception->expectExceptionMessageRegExp($regex);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        $this->exception->expectWarningMessageMatches($regex);

        return $this;
    }

    /**
     * Introduced in PHPUnit 8.4.0 as alternatives to using expectException() et al for
     * expecting PHP native errors, warnings and notices.
     *
     * expectException*() for testing PHP native notices
     * - Deprecated: PHPUnit 8.4.0
     * - Warning: PHPUnit 9.0.0
     * - Removed: PHPUnit 10.0.0
     */
    public function error(): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '8.4', '<')) {
            $this->exception->expectException('\PHPUnit\Framework\Error\Error');

            return $this;
        }
        // @codeCoverageIgnoreEnd

        $this->exception->expectError();

        return $this;
    }

    /**
     * Introduced in PHPUnit 8.4.0 as alternatives to using expectException() et al for
     * expecting PHP native errors, warnings and notices.
     *
     * expectException*() for testing PHP native notices
     * - Deprecated: PHPUnit 8.4.0
     * - Warning: PHPUnit 9.0.0
     * - Removed: PHPUnit 10.0.0
     *
     * @param string $message
     */
    public function errorMessage(string $message): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '8.4', '<')) {
            $this->exception->expectExceptionMessage($message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        $this->exception->expectErrorMessage($message);

        return $this;
    }

    /**
     * Introduced in PHPUnit 8.4.0 as alternatives to using expectException() et al for
     * expecting PHP native errors, warnings and notices.
     *
     * expectException*() for testing PHP native notices
     * - Deprecated: PHPUnit 8.4.0
     * - Warning: PHPUnit 9.0.0
     * - Removed: PHPUnit 10.0.0
     *
     * @param string $regex
     */
    public function errorMessageMatches(string $regex): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '8.4', '<')) {
            $this->exception->expectExceptionMessageRegExp($regex);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        $this->exception->expectErrorMessageMatches($regex);

        return $this;
    }
}
