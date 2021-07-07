<?php

namespace Realodix\NextProject\Expect;

use Codeception\Verify\Verifiers\VerifyDataTrait;
use PHPUnit\Framework\Assert;
use Realodix\NextProject\Expect;

class ExpectClass extends Expect
{
    use VerifyDataTrait;

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
        Assert::assertClassNotHasAttribute($attributeName, $this->actual, $message);

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
        Assert::assertClassNotHasStaticAttribute($attributeName, $this->actual, $message);

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
        Assert::assertClassHasAttribute($attributeName, $this->actual, $message);

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
        Assert::assertClassHasStaticAttribute($attributeName, $this->actual, $message);

        return $this;
    }
}
