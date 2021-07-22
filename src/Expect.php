<?php

namespace Realodix\NextProject;

use PHPUnit\Framework\TestCase;
use PHPUnit\Runner\Version;

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

    public function exceptionMessageMatches(string $regex): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '8.4', '<')) {
            $this->exception->expectExceptionMessageRegExp($regex);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        $this->exception->expectExceptionMessageMatches($regex);

        return $this;
    }

    public function deprecation(): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '8.4', '<')) {
            $this->exception->expectException('\PHPUnit\Framework\Error\Deprecated');

            return $this;
        }
        // @codeCoverageIgnoreEnd

        $this->exception->expectDeprecation();

        return $this;
    }

    public function deprecationMessage(string $message): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '8.4', '<')) {
            $this->exception->expectExceptionMessage($message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        $this->exception->expectDeprecationMessage($message);

        return $this;
    }

    public function deprecationMessageMatches(string $regex): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '8.4', '<')) {
            $this->exception->expectExceptionMessageRegExp($regex);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        $this->exception->expectDeprecationMessageMatches($regex);

        return $this;
    }

    public function notice(): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '8.4', '<')) {
            $this->exception->expectException('\PHPUnit\Framework\Error\Notice');

            return $this;
        }
        // @codeCoverageIgnoreEnd

        $this->exception->expectNotice();

        return $this;
    }

    public function noticeMessage(string $message): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '8.4', '<')) {
            $this->exception->expectExceptionMessage($message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        $this->exception->expectNoticeMessage($message);

        return $this;
    }

    public function noticeMessageMatches(string $regex): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '8.4', '<')) {
            $this->exception->expectExceptionMessageRegExp($regex);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        $this->exception->expectNoticeMessageMatches($regex);

        return $this;
    }

    public function warning(): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '8.4', '<')) {
            $this->exception->expectException('\PHPUnit\Framework\Error\Warning');

            return $this;
        }
        // @codeCoverageIgnoreEnd

        $this->exception->expectWarning();

        return $this;
    }

    public function warningMessage(string $message): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '8.4', '<')) {
            $this->exception->expectExceptionMessage($message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        $this->exception->expectWarningMessage($message);

        return $this;
    }

    public function warningMessageMatches(string $regex): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '8.4', '<')) {
            $this->exception->expectExceptionMessageRegExp($regex);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        $this->exception->expectWarningMessageMatches($regex);

        return $this;
    }

    public function error(): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '8.4', '<')) {
            $this->exception->expectException('\PHPUnit\Framework\Error\Error');

            return $this;
        }
        // @codeCoverageIgnoreEnd

        $this->exception->expectError();

        return $this;
    }

    public function errorMessage(string $message): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '8.4', '<')) {
            $this->exception->expectExceptionMessage($message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        $this->exception->expectErrorMessage($message);

        return $this;
    }

    public function errorMessageMatches(string $regex): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '8.4', '<')) {
            $this->exception->expectExceptionMessageRegExp($regex);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        $this->exception->expectErrorMessageMatches($regex);

        return $this;
    }
}
