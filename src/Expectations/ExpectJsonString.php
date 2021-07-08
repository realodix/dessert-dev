<?php

namespace Realodix\NextProject\Expectations;

use PHPUnit\Framework\Assert as PHPUnit;
use Realodix\NextProject\Expect;

class ExpectJsonString extends Expect
{
    public function __construct(string $actualJson)
    {
        parent::__construct($actualJson);
    }

    /**
     * Expect that the generated JSON encoded object and the content of the given file are not equal.
     *
     * @param string $expectedFile
     * @param string $message
     *
     * @return self
     */
    public function notToEqualJsonFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertJsonStringNotEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that two given JSON encoded objects or arrays are not equal.
     *
     * @param string $expectedJson
     * @param string $message
     *
     * @return self
     */
    public function notToEqualJsonString(string $expectedJson, string $message = ''): self
    {
        PHPUnit::assertJsonStringNotEqualsJsonString($expectedJson, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that the generated JSON encoded object and the content of the given file are equal.
     *
     * @param string $expectedFile
     * @param string $message
     *
     * @return self
     */
    public function toEqualJsonFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertJsonStringEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that two given JSON encoded objects or arrays are equal.
     *
     * @param string $expectedJson
     * @param string $message
     *
     * @return self
     */
    public function toEqualJsonString(string $expectedJson, string $message = ''): self
    {
        PHPUnit::assertJsonStringEqualsJsonString($expectedJson, $this->actual, $message);

        return $this;
    }
}
