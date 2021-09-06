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

    public function testLessThan(): void
    {
        ass(7)->lessThan(10)
              ->lessThanOrEqual(7)
              ->lessThanOrEqual(8);
    }

    public function testNull(): void
    {
        ass(null)->null();
        ass(true)->notNull();
    }

    public function testSame(): void
    {
        ass(1)->same(0 + 1)
              ->notSame(true);
    }

    public function testSameSize(): void
    {
        ass([1, 2])
            ->sameSize([1, 2])
            ->notSameSize([1, 2, 3]);
    }

    public function testStringEqualsFileCanonicalizing(): void
    {
        ass('foo_bar')
            ->stringEqualsFileCanonicalizing(TEST_FILES_PATH.'string_foobar.txt');
        ass('notSame')
            ->stringNotEqualsFileCanonicalizing(TEST_FILES_PATH.'string_foobar.txt');
    }

    public function testStringEqualsFileIgnoringCase(): void
    {
        ass('FOO_BAR')
            ->stringEqualsFileIgnoringCase(TEST_FILES_PATH.'string_foobar.txt');
        ass('Test 123')
            ->stringNotEqualsFileIgnoringCase(TEST_FILES_PATH.'string_foobar.txt');
    }

    public function testTrue(): void
    {
        ass(true)->true();
        ass(false)->notTrue();
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
