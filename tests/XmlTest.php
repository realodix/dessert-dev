<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;

final class XmlTest extends TestCase
{
    /** @var DOMDocument */
    protected $xml;

    protected function setUp(): void
    {
        $this->assetsDir = __DIR__.DIRECTORY_SEPARATOR.'_files'.DIRECTORY_SEPARATOR;
    }

    public function testXmlFileNotToFile(): void
    {
        $actual = $this->assetsDir.'xml_foo.xml';
        $expected = $this->assetsDir.'xml_bar.xml';

        ass($actual)->xmlFileNotToFile($expected);
    }

    public function testXmlFileToFile(): void
    {
        $xmlFile = $this->assetsDir.'xml_foo.xml';

        ass($xmlFile)->xmlFileToFile($xmlFile);
    }

    public function testXmlStringNotToFile(): void
    {
        $actual = file_get_contents($this->assetsDir.'xml_foo.xml');
        $expected = $this->assetsDir.'xml_bar.xml';

        ass($actual)->xmlStringNotToFile($expected);
    }

    public function testXmlStringNotToString(): void
    {
        ass('<foo/>')
            ->xmlStringNotToString('<bar/>');
    }

    public function testXmlStringToFile(): void
    {
        $xmlFile = $this->assetsDir.'xml_foo.xml';

        ass('<foo/>')->xmlStringToFile($xmlFile);
    }

    public function testXmlStringToString(): void
    {
        ass('<foo/>')
            ->xmlStringToString('<foo/>');
    }
}
