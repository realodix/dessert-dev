<?php

namespace Realodix\NextProject\Verifiers;

use PHPUnit\Framework\Assert;
use Realodix\NextProject\Verify;

class VerifyBaseObject extends Verify
{
    use VerifyDataTrait;

    /**
     * @param object $object
     */
    public function __construct(object $object)
    {
        parent::__construct($object);
    }

    /**
     * Verifies that an object has a specified attribute.
     *
     * @param string $attributeName
     * @param string $message
     *
     * @return self
     */
    public function hasAttribute(string $attributeName, string $message = ''): self
    {
        Assert::assertObjectHasAttribute($attributeName, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that an object does not have a specified attribute.
     *
     * @param string $attributeName
     * @param string $message
     *
     * @return self
     */
    public function notHasAttribute(string $attributeName, string $message = ''): self
    {
        Assert::assertObjectNotHasAttribute($attributeName, $this->actual, $message);

        return $this;
    }
}
