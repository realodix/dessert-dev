<?php

namespace Realodix\NextProject\Test\CustomAssertion;

use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;

final class ExtendedAssertionsTest extends TestCase
{
    use ExtendedAssertionsTestProvider;

    public function testHelperMethods(): void
    {
        // and()
        ass(1)->isInt
            ->and(true)->true;

        // each()
        expect([1, 2, 3, 4, 5])
            ->each->isInt;

        expect([
            function () {
            },
            function () {
            },
        ])
        ->each()->isCallable()
        ->and(1)->isInt();

        // not()
        expect(true)
            ->true()
            ->not()->false()
            ->not->false
            ->and(false)
                ->false();
    }

    public function testArrayHasKeys(): void
    {
        $array = ['name' => 'Desk', 'price' => 100];

        ass($array)
            ->arrayHasKeys(['name', 'price'])
            ->arrayNotHasKeys(['foo', 'bar']);
    }

    public function testContains(): void
    {
        ass([3, 2])
            ->contains(3)
            ->notContains(5, 'user have 5 posts');
    }

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

    /**
     * @dataProvider markupContainsSelectorProvider
     *
     * @param string $selector
     */
    public function testMarkupContainsSelector(string $selector)
    {
        // Should pick up multiple instances of a selector
        ass('<a href="#home">Home</a> | <a href="#about">About</a> | <a href="#contact">Contact</a>')
            ->markupContainsSelector('a');

        $content = '
            <a href="https://example.com" id="my-link" class="link another-class">Example</a>
        ';

        ass($content)
            // Should find matching selectors
            ->markupContainsSelector($selector)
            // Should verify that the given selector does not exist
            ->and('<span>foo bar</span>')
                ->markupNotContainsSelector($selector);
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

    public function testMarkupHasElementWithAttributes()
    {
        $content = '
            <div data-attr="foo bar baz">
                <label>Email</label><br><input type="email" value="test@example.com" />
            </div>
        ';

        ass($content)
            // Should find an element with the given attributesSelectorCount
            ->markupHasElementWithAttributes(['type' => 'email', 'value' => 'test@example.com'])
            // Should be able to parse spaces in attribute values
            ->markupHasElementWithAttributes(['data-attr' => 'foo bar baz'])
            // Should ensure no element has the provided attributes
            ->markupNotHasElementWithAttributes(['value' => 'foo@bar.com']);
    }

    public function testMarkupSelectorCount()
    {
        ass('<ul><li>1</li><li>2</li><li>3</li></ul>')
            ->markupSelectorCount(3, 'li');
    }
}
