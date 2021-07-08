<?php

namespace Realodix\NextProject\Assert;

use PHPUnit\Framework\Assert as PHPUnit;
use Realodix\NextProject\Assert;

class AssertBaseObject extends Assert
{
    use AssertDataTrait;

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
        PHPUnit::assertObjectHasAttribute($attributeName, $this->actual, $message);

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
        PHPUnit::assertObjectNotHasAttribute($attributeName, $this->actual, $message);

        return $this;
    }
}
