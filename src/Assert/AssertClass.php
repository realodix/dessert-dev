<?php

namespace Realodix\NextProject\Assert;

use PHPUnit\Framework\Assert as PHPUnit;
use Realodix\NextProject\Assert;

class AssertClass extends Assert
{
    /**
     * @param string $className
     */
    public function __construct(string $className)
    {
        parent::__construct($className);
    }

    /**
     * Verifies that a class has a specified attribute.
     *
     * @param string $attributeName
     * @param string $message
     *
     * @return self
     */
    public function hasAttribute(string $attributeName, string $message = ''): self
    {
        PHPUnit::assertClassHasAttribute($attributeName, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a class has a specified static attribute.
     *
     * @param string $attributeName
     * @param string $message
     *
     * @return self
     */
    public function hasStaticAttribute(string $attributeName, string $message = ''): self
    {
        PHPUnit::assertClassHasStaticAttribute($attributeName, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a class does not have a specified attribute.
     *
     * @param string $attributeName
     * @param string $message
     *
     * @return self
     */
    public function notHasAttribute(string $attributeName, string $message = ''): self
    {
        PHPUnit::assertClassNotHasAttribute($attributeName, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a class does not have a specified static attribute.
     *
     * @param string $attributeName
     * @param string $message
     *
     * @return self
     */
    public function notHasStaticAttribute(string $attributeName, string $message = ''): self
    {
        PHPUnit::assertClassNotHasStaticAttribute($attributeName, $this->actual, $message);

        return $this;
    }
}
