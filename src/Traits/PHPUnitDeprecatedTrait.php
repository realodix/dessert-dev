<?php

namespace Realodix\NextProject\Traits;

use PHPUnit\Framework\Assert;
use Realodix\NextProject\Support\Validator;

trait PHPUnitDeprecatedTrait
{
    /**
     * Deprecated in PHPUnit 10
     * - https://github.com/sebastianbergmann/phpunit/issues/4601
     * - https://github.com/sebastianbergmann/phpunit/issues/4602
     *
     * @param string $attributeName
     * @param string $message
     */
    public function classHasAttribute(string $attributeName, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'class');

        Assert::assertClassHasAttribute($attributeName, $actual, $message);

        return $this;
    }

    /**
     * Deprecated in PHPUnit 10
     * - https://github.com/sebastianbergmann/phpunit/issues/4601
     * - https://github.com/sebastianbergmann/phpunit/issues/4602
     *
     * @param string $attributeName
     * @param string $message
     */
    public function classNotHasAttribute(string $attributeName, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'class');

        Assert::assertClassNotHasAttribute($attributeName, $actual, $message);

        return $this;
    }

    /**
     * Deprecated in PHPUnit 10
     * - https://github.com/sebastianbergmann/phpunit/issues/4601
     * - https://github.com/sebastianbergmann/phpunit/issues/46021
     *
     * @param string $attributeName
     * @param string $message
     */
    public function classHasStaticAttribute(string $attributeName, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'class');

        Assert::assertClassHasStaticAttribute($attributeName, $actual, $message);

        return $this;
    }

    /**
     * Deprecated in PHPUnit 10
     * - https://github.com/sebastianbergmann/phpunit/issues/4601
     * - https://github.com/sebastianbergmann/phpunit/issues/4602
     *
     * @param string $attributeName
     * @param string $message
     */
    public function classNotHasStaticAttribute(string $attributeName, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'class');

        Assert::assertClassNotHasStaticAttribute($attributeName, $actual, $message);

        return $this;
    }

    /**
     * Deprecated in PHPUnit 10
     * - https://github.com/sebastianbergmann/phpunit/issues/4601
     * - https://github.com/sebastianbergmann/phpunit/issues/4602
     *
     * @param string $attributeName
     * @param string $message
     */
    public function objectHasAttribute(string $attributeName, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'object');

        Assert::assertObjectHasAttribute($attributeName, $actual, $message);

        return $this;
    }

    /**
     * Deprecated in PHPUnit 10
     * - https://github.com/sebastianbergmann/phpunit/issues/4601
     * - https://github.com/sebastianbergmann/phpunit/issues/4602
     *
     * @param string $attributeName
     * @param string $message
     */
    public function objectNotHasAttribute(string $attributeName, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'object');

        Assert::assertObjectNotHasAttribute($attributeName, $actual, $message);

        return $this;
    }
}
