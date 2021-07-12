<?php

namespace Realodix\NextProject;

use PHPUnit\Framework\TestCase;
use PHPUnit\Runner\Version as PHPUnitVersion;

class Expect extends TestCase
{
    /**
     * The code of the expected Exception.
     *
     * {@internal Note: Using a different name from the (private) PHPUnit native property on purpose.}
     *
     * @var int|null
     */
    private $exceptionCode = null;
    /**
     * The message of the expected Exception.
     *
     * {@internal Note: Using a different name from the (private) PHPUnit native property on purpose.}
     *
     * @var string
     */
    private $exceptionMessage = '';

    /**
     * Set an expectation to receive a particular type of Exception.
     *
     * @param mixed $exception The name of the exception to expect.
     *
     * @return void
     */
    public static function exception($exception)
    {
        // Introduced in PHPUnit 6.4.0
        // https://github.com/sebastianbergmann/phpunit/issues/3511
        if (version_compare(PHPUnitVersion::series(), '6.4', '<')) {
            // @codeCoverageIgnoreStart
            return (new self)->setExpectedException(
                $exception,
                (new self)->exceptionMessage,
                (new self)->exceptionCode
            );
            // @codeCoverageIgnoreEnd
        }

        return (new self)->expectException($exception);
    }
}
