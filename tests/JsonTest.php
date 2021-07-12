<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;

final class JsonTest extends TestCase
{
    protected function setUp(): void
    {
        $this->assetsDir = __DIR__.DIRECTORY_SEPARATOR.'_files'.DIRECTORY_SEPARATOR;
    }

    public function testJson(): void
    {
        $json = json_encode(['foo' => 'bar']);

        ass($json)->json();
    }

    public function testJsonFileEqualsJsonFile(): void
    {
        $fileExpected = $this->assetsDir.'Json/arrayObject.json';
        $fileActual = $this->assetsDir.'Json/simpleObject.json';

        ass($fileActual)->jsonFileToFile($fileActual);
        ass($fileActual)->jsonFileNotToFile($fileExpected);
    }

    public function testJsonStringEqualsJsonFile(): void
    {
        $jsonFile = $this->assetsDir.'Json/simpleObject.json';
        $jsonString = json_encode(['foo' => 'bar']);

        ass($jsonString)->jsonStringToFile($jsonFile);
        ass(json_encode(['foo' => 'baz']))->jsonStringNotToFile($jsonFile);
    }

    public function testJsonStringEqualsJsonString(): void
    {
        $jsonString = json_encode(['foo' => 'bar']);

        ass($jsonString)->jsonStringToString($jsonString);
        ass($jsonString)->jsonStringNotToString(json_encode(['foo' => 'baz']));
    }
}
