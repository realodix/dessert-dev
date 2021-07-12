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
        ass(json_encode(['foo' => 'bar']))->json();
    }

    public function testJsonFileEqualsJsonFile(): void
    {
        $fileExpected = $this->assetsDir.'JsonData/arrayObject.json';
        $fileActual = $this->assetsDir.'JsonData/simpleObject.json';

        ass($fileActual)->jsonFileToFile($fileActual);
        ass($fileActual)->jsonFileNotToFile($fileExpected);
    }

    public function testJsonStringEqualsJsonFile(): void
    {
        $jsonFile = $this->assetsDir.'JsonData/simpleObject.json';
        $jsonString = json_encode(['Mascott' => 'Tux']);

        ass($jsonString)->jsonStringToFile($jsonFile);
        ass(json_encode(['foo' => 'bar']))->jsonStringNotToFile($jsonFile);
    }

    public function testJsonStringEqualsJsonString(): void
    {
        $jsonString = json_encode(['Mascott' => 'Tux']);

        ass($jsonString)->jsonStringToString($jsonString);
        ass($jsonString)->jsonStringNotToString(json_encode(['foo' => 'bar']));
    }
}
