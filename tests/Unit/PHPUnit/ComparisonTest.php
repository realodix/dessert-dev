<?php

namespace Realodix\NextProject\Test\PHPUnit;

use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\TestCase;

final class ComparisonTest extends TestCase
{
    /**
     * Iterable contains equal object can be asserted
     */
    public function testContainsEquals(): void
    {
        $a = new \stdClass;
        $a->foo = 'bar';

        $b = new \stdClass;
        $b->foo = 'baz';

        ass([$a])->containsEquals($a);

        try {
            ass([$a])->containsEquals($b);
        } catch (AssertionFailedError $e) {
            return;
        }

        $this->fail();
    }

    /**
     * Iterable not contains equal object can be asserted
     */
    public function testNotContainsEquals(): void
    {
        $a = new \stdClass;
        $a->foo = 'bar';

        $b = new \stdClass;
        $b->foo = 'baz';

        ass([$a])->notContainsEquals($b);

        try {
            ass([$a])->notContainsEquals($a);
        } catch (AssertionFailedError $e) {
            return;
        }

        $this->fail();
    }

    public function testXmlFileEqualsXmlFile(): void
    {
        $actual = TEST_FILES_PATH.'xml_foo.xml';
        $expected = TEST_FILES_PATH.'xml_bar.xml';

        ass($actual)
            ->xmlFileToFile($actual)
            ->xmlFileNotToFile($expected);
    }

    public function testXmlStringEqualsXmlFile(): void
    {
        $xmlFoo = TEST_FILES_PATH.'xml_foo.xml';
        $xmlBar = TEST_FILES_PATH.'xml_bar.xml';

        ass('<foo/>')
            ->xmlStringToFile($xmlFoo)
            ->xmlStringNotToFile($xmlBar);
    }

    public function testXmlStringEqualsXmlString(): void
    {
        ass('<foo/>')
            ->xmlStringToString('<foo/>')
            ->xmlStringNotToString('<bar/>');
    }
}
