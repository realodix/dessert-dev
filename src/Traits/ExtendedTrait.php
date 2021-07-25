<?php

namespace Realodix\NextProject\Traits;

use Realodix\NextProject\Extend\AssertMixed;
use Realodix\NextProject\Extend\Markup;
use Realodix\NextProject\Extend\Modified;
use Realodix\NextProject\Support\Validator;

trait ExtendedTrait
{
    public function contains($needle, string $message = ''): self
    {
        Modified::assertContains($needle, $this->actual, $message);

        return $this;
    }

    public function notContains($needle, string $message = ''): self
    {
        Modified::assertNotContains($needle, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $expectedFile
     * @param string $message
     */
    public function stringEqualsFile(string $expectedFile, string $message = ''): self
    {
        Modified::assertStringEqualsFile($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $expectedFile
     * @param string $message
     */
    public function stringNotEqualsFile(string $expectedFile, string $message = ''): self
    {
        Modified::assertStringNotEqualsFile($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $expected
     * @param string $message
     */
    public function stringEquals(string $expected, string $message = ''): self
    {
        AssertMixed::stringEquals($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $expected
     * @param string $message
     */
    public function stringNotEquals(string $expected, string $message = ''): self
    {
        AssertMixed::stringNotEquals($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $needle
     * @param string $message
     */
    public function stringContainsStringIgnoringLineEndings(string $needle, string $message = ''): self
    {
        AssertMixed::stringContainsStringIgnoringLineEndings($needle, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $expected
     * @param string $message
     */
    public function stringEqualIgnoringLineEndings(string $expected, string $message = ''): self
    {
        AssertMixed::stringEqualIgnoringLineEndings($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $expectedString
     * @param string $message
     */
    public function fileEqualsString(string $expectedString, string $message = ''): self
    {
        AssertMixed::fileEqualsString($expectedString, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $expectedString
     * @param string $message
     */
    public function fileNotEqualsString(string $expectedString, string $message = ''): self
    {
        AssertMixed::fileNotEqualsString($expectedString, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $expectedString
     * @param string $message
     */
    public function fileEqualsStringIgnoringCase(string $expectedString, string $message = ''): self
    {
        AssertMixed::fileEqualsStringIgnoringCase($expectedString, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $expectedString
     * @param string $message
     */
    public function fileNotEqualsStringIgnoringCase(string $expectedString, string $message = ''): self
    {
        AssertMixed::fileNotEqualsStringIgnoringCase($expectedString, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $selector
     * @param string $message
     */
    public function markupContainsSelector(string $selector, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Markup::assertContainsSelector($selector, $actual, $message);

        return $this;
    }

    /**
     * @param string $selector
     * @param string $message
     */
    public function markupNotContainsSelector(string $selector, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Markup::assertNotContainsSelector($selector, $actual, $message);

        return $this;
    }

    /**
     * @param string $contents
     * @param string $selector
     * @param string $message
     */
    public function markupElementContains(string $contents, string $selector = '', string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Markup::assertElementContains($contents, $selector, $actual, $message);

        return $this;
    }

    /**
     * @param string $contents
     * @param string $selector
     * @param string $message
     */
    public function markupElementNotContains(string $contents, string $selector = '', string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Markup::assertElementNotContains($contents, $selector, $actual, $message);

        return $this;
    }

    /**
     * @param string $regexp
     * @param string $selector
     * @param string $message
     */
    public function markupElementRegExp(string $regexp, string $selector = '', string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Markup::assertElementRegExp($regexp, $selector, $actual, $message);

        return $this;
    }

    /**
     * @param string $regexp
     * @param string $selector
     * @param string $message
     */
    public function markupElementNotRegExp(string $regexp, string $selector = '', string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Markup::assertElementNotRegExp($regexp, $selector, $actual, $message);

        return $this;
    }

    /**
     * @param array  $attributes
     * @param string $message
     */
    public function markupHasElementWithAttributes(array $attributes = [], string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Markup::assertHasElementWithAttributes($attributes, $actual, $message);

        return $this;
    }

    /**
     * @param array  $attributes
     * @param string $message
     */
    public function markupNotHasElementWithAttributes(array $attributes = [], string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Markup::assertNotHasElementWithAttributes($attributes, $actual, $message);

        return $this;
    }

    /**
     * @param int    $count
     * @param string $selector
     * @param string $message
     */
    public function markupSelectorCount(int $count, string $selector, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Markup::assertSelectorCount($count, $selector, $actual, $message);

        return $this;
    }
}
