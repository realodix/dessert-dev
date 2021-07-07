<?php

namespace Realodix\NextProject\Verifiers;

use PHPUnit\Framework\Assert;
use Realodix\NextProject\Verify;

class VerifyClass extends Verify
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
        Assert::assertClassHasAttribute($attributeName, $this->actual, $message);

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
        Assert::assertClassHasStaticAttribute($attributeName, $this->actual, $message);

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
        Assert::assertClassNotHasAttribute($attributeName, $this->actual, $message);

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
        Assert::assertClassNotHasStaticAttribute($attributeName, $this->actual, $message);

        return $this;
    }
}
