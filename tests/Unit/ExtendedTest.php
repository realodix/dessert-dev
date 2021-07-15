<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\TestCase;

final class ExtendedTest extends TestCase
{
    /**
     * Data provider for test markupContainsSelector().
     */
    public function markupContainsSelectorProvider()
    {
        return [
            'Simple tag name'         => ['a'],
            'Class name'              => ['.link'],
            'Multiple class names'    => ['.link.another-class'],
            'Element ID'              => ['#my-link'],
            'Tag name with class'     => ['a.link'],
            'Tag name with ID'        => ['a#my-link'],
            'Tag with href attribute' => ['a[href="https://example.com"]'],
        ];
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
        ass('ipsum')->markupElementContains(
            '#main',
            '<header>Lorem ipsum</header><div id="main">Lorem ipsum</div>'
        );

        // Should be able to chain multiple selectors
        ass('ipsum')->markupElementContains(
            '#main .foo',
            '<div id="main"><span class="foo">Lorem ipsum</span></div>'
        );

        // Should scope text to the selected element
        $exceptionMsg = 'The #main div does not contain the string "ipsum".';
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessage($exceptionMsg);

        ass('ipsum')->markupElementContains(
            '#main',
            '<header>Lorem ipsum</header><div id="main">Foo bar baz</div>',
            $exceptionMsg
        );

        // Should be able to search for a selector
        ass('ipsum')->markupElementNotContains(
            '#main',
            '<header>Foo bar baz</header><div id="main">Some string</div>'
        );
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
        // Should find an element with the given attributes
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
        ass(3)->markupSelectorCount('li', '<ul><li>1</li><li>2</li><li>3</li></ul>');
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
}
