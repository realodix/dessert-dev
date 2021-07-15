<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;

final class ExtendedTest extends TestCase
{
    public function testContains(): void
    {
        ass([3, 2])->contains(3);
        ass([3, 2])->notContains(5, 'user have 5 posts');
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
     * @dataProvider markupContainsSelectorProvider
     */
    public function testMarkupContainsSelector($selector)
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

    public function testMarkupSelectorCount()
    {
        ass(3)->markupSelectorCount('li', '<ul><li>1</li><li>2</li><li>3</li></ul>');
    }

    /**
     * Data provider for test markupContainsSelector().
     */
    public function markupContainsSelectorProvider ()
    {
        return [
            'Simple tag name' => ['a'],
            'Class name' => ['.link'],
            'Multiple class names' => ['.link.another-class'],
            'Element ID' => ['#my-link'],
            'Tag name with class' => ['a.link'],
            'Tag name with ID' => ['a#my-link'],
            'Tag with href attribute' => ['a[href="https://example.com"]'],
        ];
    }
}
