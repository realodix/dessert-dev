<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;

final class ShortcutTest extends TestCase
{
    protected function setUp(): void
    {
        $this->assetsDir = __DIR__.DIRECTORY_SEPARATOR.'_files'.DIRECTORY_SEPARATOR;
    }

    /** @test */
    public function regExp(): void
    {
        ass('foobar')->match('/foobar/');
        ass('foobar')->notMatch('/foobarbaz/');
    }

    public function testAssertJsonFile(): void
    {
        $fileExpected = $this->assetsDir.'JsonData/arrayObject.json';
        $fileActual = $this->assetsDir.'JsonData/simpleObject.json';

        ass($fileActual)->jsonFileToFile($fileActual);
        ass($fileExpected)->jsonFileNotToFile($fileActual);
    }

    public function testAssertJsonString(): void
    {
        $fileArrayObject = $this->assetsDir.'JsonData/arrayObject.json';
        $fileSimpleObject = $this->assetsDir.'JsonData/simpleObject.json';
        $jsonString = json_encode(['Mascott' => 'Tux']);

        ass($jsonString)->jsonStringToFile($fileSimpleObject);
        ass(json_encode(['foo' => 'bar']))->jsonStringNotToFile($fileSimpleObject);
        ass($jsonString)->jsonStringToString($jsonString);
        ass($jsonString)->jsonStringNotToString(json_encode(['foo' => 'bar']));
    }

    public function testGreaterThan(): void
    {
        ass(2)->greater(1);
        ass(1)->greaterOrEqual(1);

        ass(2)->isAbove(1);
        ass(1)->isAtLeast(1);
    }

    public function testLessThan(): void
    {
        ass(1)->less(2);
        ass(1)->lessOrEqual(1);

        ass(1)->isBelow(2);
        ass(1)->isAtMost(1);
    }
}
