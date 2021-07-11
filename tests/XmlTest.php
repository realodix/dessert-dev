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

    public function testXmlFileEqualsXmlFile(): void
    {
        $xmlFile = $this->assetsDir.'xml-foo.xml';

        ass($xmlFile)->xmlFileEqualsXmlFile($xmlFile);
    }

    public function testXmlFileNotEqualsXmlFile(): void
    {
        $actual = $this->assetsDir.'xml-foo.xml';
        $expected = $this->assetsDir.'xml-bar.xml';

        ass($actual)->xmlFileNotEqualsXmlFile($expected);
    }

    public function testXmlStringEqualsXmlFile(): void
    {
        $xmlFile = $this->assetsDir.'xml-foo.xml';

        ass('<foo/>')->xmlStringEqualsXmlFile($xmlFile);
    }

    public function testXmlStringEqualsXmlString(): void
    {
        ass('<foo/>')
            ->xmlStringEqualsXmlString('<foo/>');
    }

    public function testXmlStringNotEqualsXmlFile(): void
    {
        $actual = file_get_contents($this->assetsDir.'xml-foo.xml');
        $expected = $this->assetsDir.'xml-bar.xml';

        ass($actual)->xmlStringNotEqualsXmlFile($expected);
    }

    public function testXmlStringNotEqualsXmlString(): void
    {
        ass('<foo/>')
            ->xmlStringNotEqualsXmlString('<bar/>');
    }
}
