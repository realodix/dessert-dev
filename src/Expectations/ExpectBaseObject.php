<?php

namespace Realodix\NextProject\Expectations;

use PHPUnit\Framework\Assert as PHPUnit;
use Realodix\NextProject\Expect;
use Realodix\NextProject\Traits\ExpectDataTrait;

class ExpectBaseObject extends Expect
{
    use ExpectDataTrait;

    /**
     * @param object $object
     */
    public function __construct(object $object)
    {
        parent::__construct($object);
    }

    /**
     * Expect that an object does not have a specified attribute.
     *
     * @param string $attributeName
     * @param string $message
     *
     * @return self
     */
    public function notToHaveAttribute(string $attributeName, string $message = ''): self
    {
        PHPUnit::assertObjectNotHasAttribute($attributeName, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that an object has a specified attribute.
     *
     * @param string $attributeName
     * @param string $message
     *
     * @return self
     */
    public function toHaveAttribute(string $attributeName, string $message = ''): self
    {
        PHPUnit::assertObjectHasAttribute($attributeName, $this->actual, $message);

        return $this;
    }
}
