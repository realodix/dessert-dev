<?php

namespace Realodix\NextProject\Assert;

use PHPUnit\Framework\Assert as PHPUnit;

class AssertJsonString extends Assert
{
    public function __construct(string $actualJson)
    {
        parent::__construct($actualJson);
    }

    /**
     * Verifies that the generated JSON encoded object and the content of the given file are equal.
     *
     * @param string $expectedFile
     * @param string $message
     *
     * @return self
     */
    public function equalsJsonFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertJsonStringEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that two given JSON encoded objects or arrays are equal.
     *
     * @param string $expectedJson
     * @param string $message
     *
     * @return self
     */
    public function equalsJsonString(string $expectedJson, string $message = ''): self
    {
        PHPUnit::assertJsonStringEqualsJsonString($expectedJson, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that the generated JSON encoded object and the content of the given file are not equal.
     *
     * @param string $expectedFile
     * @param string $message
     *
     * @return self
     */
    public function notEqualsJsonFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertJsonStringNotEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that two given JSON encoded objects or arrays are not equal.
     *
     * @param string $expectedJson
     * @param string $message
     *
     * @return self
     */
    public function notEqualsJsonString(string $expectedJson, string $message = ''): self
    {
        PHPUnit::assertJsonStringNotEqualsJsonString($expectedJson, $this->actual, $message);

        return $this;
    }
}
