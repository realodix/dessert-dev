<?php

namespace Realodix\NextProject\Traits;

use PHPUnit\Framework\Assert as PHPUnit;
use Realodix\NextProject\Helpers\ValidatorHelper as Validator;

trait ExtendedTrait
{
    public function stringEqualsString(string $expected, string $message = ''): self
    {
        if (Validator::isJson($expected)) {
            PHPUnit::assertJsonStringEqualsJsonString($expected, $this->actual, $message);

            return $this;
        }

        PHPUnit::assertEquals($expected, $this->actual, $message);

        return $this;
    }
}
