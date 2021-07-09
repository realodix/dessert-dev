<?php

namespace Realodix\NextProject\Assert;

use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Runner\Version as PHPUnitVersion;

class AssertString extends Assert
{
    public function __construct(string $string)
    {
        parent::__construct($string);
    }

    /**
     * Verifies that a string does not match a given regular expression.
     *
     * @param string $pattern
     * @param string $message
     *
     * @return self
     */
    public function doesNotMatchRegularExpression(string $pattern, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            PHPUnit::assertNotRegExp($pattern, $this->actual, $message);

            return $this;
        }

        PHPUnit::assertDoesNotMatchRegularExpression($pattern, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a string is a valid JSON string.
     *
     * @param string $message
     *
     * @return self
     */
    public function json(string $message = ''): self
    {
        PHPUnit::assertJson($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a string matches a given regular expression.
     *
     * @param string $pattern
     * @param string $message
     *
     * @return self
     */
    public function matchesRegularExpression(string $pattern, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            PHPUnit::assertRegExp($pattern, $this->actual, $message);

            return $this;
        }

        PHPUnit::assertMatchesRegularExpression($pattern, $this->actual, $message);

        return $this;
    }
}
