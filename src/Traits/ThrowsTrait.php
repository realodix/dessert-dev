<?php

namespace Realodix\NextProject\Traits;

use Exception;
use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Framework\ExpectationFailedException;
use Throwable;

trait ThrowsTrait
{
    public function doesNotThrow($throws = null, $message = false): self
    {
        if ($throws instanceof Exception) {
            $message = $throws->getMessage();
            $throws = get_class($throws);
        }

        try {
            call_user_func($this->actual);
        } catch (Throwable $exception) {
            if (! $throws) {
                throw new ExpectationFailedException('exception was not expected to be thrown');
            }

            $actualThrows = get_class($exception);
            $actualMessage = $exception->getMessage();

            if ($throws !== $actualThrows) {
                return $this;
            }

            if (! $message) {
                throw new ExpectationFailedException(
                    sprintf('exception \'%s\' was not expected to be thrown', $throws)
                );
            }

            if ($message === $actualMessage) {
                throw new ExpectationFailedException(
                    sprintf('exception \'%s\' with message \'%s\' was not expected to be thrown', $throws, $message)
                );
            }
        }

        return $this;
    }

    public function throws($throws = null, $message = false): self
    {
        if ($throws instanceof Exception) {
            $message = $throws->getMessage();
            $throws = get_class($throws);
        }

        try {
            call_user_func($this->actual);
        } catch (Throwable $exception) {
            if (! $throws) {
                return $this; // it throws
            }

            $actualThrows = get_class($exception);
            $actualMessage = $exception->getMessage();

            PHPUnit::assertSame(
                $throws,
                $actualThrows,
                sprintf('exception \'%s\' was expected, but \'%s\' was thrown', $throws, $actualThrows)
            );

            if ($message) {
                PHPUnit::assertSame(
                    $message,
                    $actualMessage,
                    sprintf('exception message \'%s\' was expected, but \'%s\' was received', $message, $actualMessage)
                );
            }
        }

        if (! isset($exception)) {
            throw new ExpectationFailedException(
                sprintf('exception \'%s\' was not thrown as expected', $throws)
            );
        }

        return $this;
    }
}
