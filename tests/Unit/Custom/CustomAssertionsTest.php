<?php

namespace Realodix\Dessert\Test\Custom;

use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;

final class CustomAssertionsTest extends TestCase
{
    use CustomAssertionsTestProvider;

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

    /**
     * @dataProvider markupContainsSelectorProvider
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

    public function testThrow()
    {
        ass(function () {throw new \RuntimeException; })
            ->throw(\RuntimeException::class)
            ->throw(\Exception::class)
            ->throw(function (\RuntimeException $e) {});

        ass(function () {throw new \RuntimeException('actual message'); })
            ->throw(function (\Exception $e) {
                ass($e->getMessage())->same('actual message');
            });

        ass(function () {throw new \RuntimeException('actual message'); })
            ->throw('actual message')
            ->throw(\RuntimeException::class, 'actual message')
            ->throw(function (\RuntimeException $e) {}, 'actual message');
    }

    public function testThrowNotFailures()
    {
        $this->expectException(ExpectationFailedException::class);
        ass(function () { throw new RuntimeException; })->not->throw(RuntimeException::class);
    }

    public function testNotThrow()
    {
        ass(function () {})->not->throw(\Exception::class);

        ass(function () {throw new Exception; })->not->throw(\RuntimeException::class);
    }

    public function testThrowFailures1()
    {
        $this->expectException(
            ExpectationFailedException::class,
            'Exception "'.\RuntimeException::class.'" not thrown.'
        );
        ass(function () {})->throw(\RuntimeException::class);
    }

    public function testThrowFailures2()
    {
        $this->expectException(
            ExpectationFailedException::class,
            'Exception "'.\RuntimeException::class.'" not thrown.'
        );
        ass(function () {})->throw(function (\RuntimeException $e) {});
    }

    public function testThrowFailures3()
    {
        $this->expectException(
            ExpectationFailedException::class,
            'Failed asserting that Exception Object'
        );
        ass(function () { throw new Exception; })->throw(function (RuntimeException $e) {});
    }

    public function testThrowFailures4()
    {
        $this->expectException(
            ExpectationFailedException::class,
            'Failed asserting that two strings are identical'
        );
        ass(function () { throw new \Exception('actual message'); })
            ->throw(function (\Exception $e) {
                ass($e->getMessage())->same('expected message');
            });
    }

    public function testThrowFailures5()
    {
        $this->expectException(
            ExpectationFailedException::class,
            'Failed asserting that \'actual message\' contains "expected message".'
        );
        ass(function () { throw new \Exception('actual message'); })->throw('expected message');
    }

    public function testThrowFailures6()
    {
        $this->expectException(
            ExpectationFailedException::class,
            'Exception with message "actual message" not thrown'
        );
        ass(function () {})->throw('actual message');
    }

    public function testThrowFailures7()
    {
        $this->expectException(ExpectationFailedException::class);
        ass(function () { throw new \RuntimeException('actual message'); })
            ->throw(\RuntimeException::class, 'expected message');
    }

    public function testThrowClosureMissingParameter()
    {
        $this->expectException(
            \LogicException::class,
            'The "throw" closure must have a single parameter type-hinted as the class string'
        );
        ass(function () {})->throw(function () {});
    }

    public function testThrowClosureMissingTypeHint()
    {
        $this->expectException(
            \LogicException::class,
            'The "throw" closure\'s parameter must be type-hinted as the class string'
        );
        ass(function () {})->throw(function ($e) {});
    }
}
