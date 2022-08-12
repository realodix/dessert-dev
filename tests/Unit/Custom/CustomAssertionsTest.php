<?php

namespace Realodix\Dessert\Test\Custom;

use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\TestCase;

final class CustomAssertionsTest extends TestCase
{
    public function testHasLength()
    {
        ass([
            'Fortaleza', 'Sollefteå', 'Ιεράπετρα',
            (object) [1, 2, 3, 4, 5, 6, 7, 8, 9],
        ])
        ->each()
        ->hasLength(9);

        ass([1, 2, 3])->hasLength(3);
    }

    public function testNotHasLength()
    {
        ass([
            'Fortaleza', 'Sollefteå', 'Ιεράπετρα',
            (object) [1, 2, 3, 4, 5, 6, 7, 8, 9],
        ])
        ->each()
        ->notHasLength(1);

        ass([1, 2, 3])->notHasLength(1);
    }

    public function testHasLengthError()
    {
        $this->expectException(\BadMethodCallException::class);
        ass([1, 1.5, true, null])->each->hasLength(1);
    }

    public function testStringEquals(): void
    {
        ass('hello')
            ->stringEquals('hello')
            ->stringNotEquals('string');

        // JSon
        $jsonString = json_encode(['foo' => 'bar']);
        ass($jsonString)
            ->stringEquals($jsonString)
            ->stringNotEquals(json_encode(['foo' => 'baz']));

        // XML
        $xmlString = '<foo/>';
        ass($xmlString)
            ->stringEquals($xmlString)
            ->stringNotEquals('<bar/>');
    }

    public function testFileEqualsString(): void
    {
        $xmlFile = TEST_FILES_PATH.'xml_foo.xml';

        ass($xmlFile)
            ->fileEqualsString('<foo/>')
            ->fileNotEqualsString('<FOO/>');
    }

    public function testFileEqualsStringIgnoringCase(): void
    {
        $xmlFile = TEST_FILES_PATH.'xml_foo.xml';

        ass($xmlFile)
            ->fileEqualsStringIgnoringCase('<FOO/>')
            ->fileNotEqualsStringIgnoringCase('<bar/>');
    }

    public function testMarkupElementContains()
    {
        $content = '
            <div id="main"><span class="foo">Lorem ipsum</span></div>
        ';

        ass($content)
            // Should be able to search for a selector
            ->markupElementContains('ipsum', '#main')
            // Should be able to chain multiple selectors
            ->markupElementContains('ipsum', '#main .foo')
            // Should be able to search for a selector
            ->markupElementNotContains('ipsum', '#foo');
    }

    public function testMarkupElementContainsWithException()
    {
        // Should scope text to the selected element
        $exceptionMsg = 'The #main div does not contain the string "ipsum".';
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessage($exceptionMsg);

        ass('<header>Lorem ipsum</header><div id="main">Foo bar baz</div>')
            ->markupElementContains('ipsum', '#main', $exceptionMsg);
    }

    public function testMarkupElementRegExp()
    {
        $content = '
            <div id="main">ABC123</div>
            <div id="sidebar"><span>ABC</span></div>
        ';

        ass($content)
            // Should use regular expression matching
            ->markupElementRegExp('/[A-Z0-9-]+/', '#main')
            // Should be able to search for nested contents
            ->markupElementRegExp('/[A-Z]+/', '#sidebar')
            // Should use regular expression matching
            ->markupElementNotRegExp('/[0-9-]+/', '#sidebar');
    }

    public function testMarkupSelectorCount()
    {
        ass('<ul><li>1</li><li>2</li><li>3</li></ul>')
            ->markupSelectorCount(3, 'li');
    }
}
