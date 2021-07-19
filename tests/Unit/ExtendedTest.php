<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;

final class ExtendedTest extends TestCase
{
    use ExtendedTestProvider;

    public function testHelperMethods(): void
    {
        // and()
        ass(1)->isInt(3)
            ->and(true)->true();

        // each()
        expect([1, 2, 3, 4, 5])
            ->each()->isInt();

        expect([
            function () {
            },
            function () {
            },
        ])
        ->each()->isCallable()
        ->and(1)->isInt();
    }

    public function testContains(): void
    {
        ass([3, 2])->contains(3);
        ass([3, 2])->notContains(5, 'user have 5 posts');
    }

    /**
     * @dataProvider markupContainsSelectorProvider
     *
     * @param string $selector
     */
    public function testMarkupContainsSelector(string $selector)
    {
        // Should find matching selectors
        ass('<a href="https://example.com" id="my-link" class="link another-class">Example</a>')
            ->markupContainsSelector($selector);

        // Should pick up multiple instances of a selector
        ass('<a href="#home">Home</a> | <a href="#about">About</a> | <a href="#contact">Contact</a>')
            ->markupContainsSelector('a');

        // Should verify that the given selector does not exist
        ass('<h1 id="page-title" class="foo bar">This element has little to do with the link.</h1>')
            ->markupNotContainsSelector($selector);
    }

    public function testMarkupElementContains()
    {
        // Should be able to search for a selector
        ass('<header>Lorem ipsum</header><div id="main">Lorem ipsum</div>')
            ->markupElementContains('ipsum', '#main');

        // Should be able to chain multiple selectors
        ass('<div id="main"><span class="foo">Lorem ipsum</span></div>')
            ->markupElementContains('ipsum', '#main .foo');

        // Should be able to search for a selector
        ass('<header>Foo bar baz</header><div id="main">Some string</div>')
            ->markupElementNotContains('ipsum', '#main');
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
        // Should use regular expression matching
        ass('<header>Lorem ipsum</header><div id="main">ABC123</div>')
            ->markupElementRegExp('/[A-Z0-9-]+/', '#main');

        // Should be able to search for nested contents
        ass('<header>Lorem ipsum</header><div id="main"><span>ABC</span></div>')
            ->markupElementRegExp('/[A-Z]+/', '#main');

        // Should use regular expression matching
        ass('<header>Foo bar baz</header><div id="main">ABC</div>')
            ->markupElementNotRegExp('/[0-9-]+/', '#main');
    }

    public function testMarkupHasElementWithAttributes()
    {
        // Should find an element with the given attributesSelectorCount
        $expected = [
            'type'  => 'email',
            'value' => 'test@example.com',
        ];
        $actual = '<label>Email</label><br><input type="email" value="test@example.com" />';

        ass($actual)->markupHasElementWithAttributes($expected);

        // Should be able to parse spaces in attribute values
        $expected = [
            'data-attr' => 'foo bar baz',
        ];
        $actual = '<div data-attr="foo bar baz">Contents</div>';

        ass($actual)->markupHasElementWithAttributes($expected);

        // Should ensure no element has the provided attributes
        $expected = [
            'type'  => 'email',
            'value' => 'test@example.com',
        ];
        $actual = '<label>City</label><br><input type="text" value="New York" data-foo="bar" />';

        ass($actual)->markupNotHasElementWithAttributes($expected);
    }

    public function testMarkupSelectorCount()
    {
        ass('<ul><li>1</li><li>2</li><li>3</li></ul>')
            ->markupSelectorCount(3, 'li');
    }

    public function testStringEqualsFile(): void
    {
        $stringFile = TEST_FILES_PATH.'string_foobar.txt';
        ass('foo_bar')->stringEqualsFile($stringFile);
        ass('another_string')->stringNotEqualsFile($stringFile);

        // JSon
        $jsonFile = TEST_FILES_PATH.'json_simple_object.json';
        $jsonString = json_encode(['foo' => 'bar']);
        ass($jsonString)->stringEqualsFile($jsonFile);
        ass(json_encode(['foo' => 'baz']))->stringNotEqualsFile($jsonFile);

        // XML
        $xmlFoo = TEST_FILES_PATH.'xml_foo.xml';
        $xmlBar = TEST_FILES_PATH.'xml_bar.xml';
        ass('<foo/>')->stringEqualsFile($xmlFoo);
        ass('<foo/>')->stringNotEqualsFile($xmlBar);
    }

    public function testStringEqualsString(): void
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

    /**
     * @dataProvider stringContainsStringIgnoringLineEndingsProvider
     *
     * @param string $needle
     * @param string $haystack
     */
    public function testStringContainsStringIgnoringLineEndings(string $needle, string $haystack): void
    {
        ass($haystack)
            ->stringContainsStringIgnoringLineEndings($needle);
    }

    public function testNotStringContainsStringIgnoringLineEndings(): void
    {
        $this->expectException(ExpectationFailedException::class);

        ass("\r\nc\r\n")
            ->stringContainsStringIgnoringLineEndings("b\nc");
    }

    /**
     * @dataProvider stringEqualIgnoringLineEndingsProvider
     *
     * @param string $expected
     * @param string $actual
     */
    public function testStringEqualIgnoringLineEndings(string $expected, string $actual): void
    {
        ass($actual)
            ->stringEqualIgnoringLineEndings($expected);
    }

    /**
     * @dataProvider stringEqualIgnoringLineEndingsFailProvider
     *
     * @param string $expected
     * @param string $actual
     */
    public function testNotStringEqualIgnoringLineEndings(string $expected, string $actual): void
    {
        $this->expectException(ExpectationFailedException::class);
        ass($actual)
            ->stringEqualIgnoringLineEndings($expected);
    }

    public function testFileEqualsString(): void
    {
        $xmlFile = TEST_FILES_PATH.'xml_foo.xml';

        ass($xmlFile)->fileEqualsString('<foo/>');
        ass($xmlFile)->fileNotEqualsString('<bar/>');
    }
}
