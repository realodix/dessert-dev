<?php

namespace Realodix\NextProject\Expectations;

use PHPUnit\Framework\Assert as PHPUnit;
use Realodix\NextProject\Expect;
use Realodix\NextProject\Trait\AssertDataTrait;

class ExpectClass extends Expect
{
    use AssertDataTrait;

    /**
     * @param string $className
     */
    public function __construct(string $className)
    {
        parent::__construct($className);
    }

    /**
     * Expect that a class does not have a specified attribute.
     *
     * @param string $attributeName
     * @param string $message
     *
     * @return self
     */
    public function notToHaveAttribute(string $attributeName, string $message = ''): self
    {
        PHPUnit::assertClassNotHasAttribute($attributeName, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that a class does not have a specified static attribute.
     *
     * @param string $attributeName
     * @param string $message
     *
     * @return self
     */
    public function notToHaveStaticAttribute(string $attributeName, string $message = ''): self
    {
        PHPUnit::assertClassNotHasStaticAttribute($attributeName, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that a class has a specified attribute.
     *
     * @param string $attributeName
     * @param string $message
     *
     * @return self
     */
    public function toHaveAttribute(string $attributeName, string $message = ''): self
    {
        PHPUnit::assertClassHasAttribute($attributeName, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that a class has a specified static attribute.
     *
     * @param string $attributeName
     * @param string $message
     *
     * @return self
     */
    public function toHaveStaticAttribute(string $attributeName, string $message = ''): self
    {
        PHPUnit::assertClassHasStaticAttribute($attributeName, $this->actual, $message);

        return $this;
    }
}
