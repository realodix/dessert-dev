<?php

namespace Realodix\NextProject\Traits;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\Constraint\IsEqualIgnoringCase;
use PHPUnit\Framework\Constraint\LogicalNot;
use PHPUnit\Framework\Constraint\StringContains;
use PHPUnit\Runner\Version;
use Realodix\NextProject\Support\Markup;
use Realodix\NextProject\Support\Modified;
use Realodix\NextProject\Support\Str;
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

    public function stringEquals($expected, string $message = ''): self
    {
        if (Validator::isJson($this->actual)) {
            Assert::assertJsonStringEqualsJsonString($expected, $this->actual, $message);

            return $this;
        }

        if (Validator::isXml($this->actual)) {
            Assert::assertXmlStringEqualsXmlString($expected, $this->actual, $message);

            return $this;
        }

        Assert::assertEquals($expected, $this->actual, $message);

        return $this;
    }

    public function stringNotEquals($expected, string $message = ''): self
    {
        if (Validator::isJson($this->actual)) {
            Assert::assertJsonStringNotEqualsJsonString($expected, $this->actual, $message);

            return $this;
        }

        if (Validator::isXml($this->actual)) {
            Assert::assertXmlStringNotEqualsXmlString($expected, $this->actual, $message);

            return $this;
        }

        Assert::assertNotEquals($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts string contains string ignoring line endings
     *
     * Reference:
     * - https://github.com/sebastianbergmann/phpunit/pull/4670
     *
     * @param string $needle
     * @param string $message
     */
    public function stringContainsStringIgnoringLineEndings(string $needle, string $message = ''): self
    {
        $needle = Str::normalizeLineEndings($needle);
        $haystack = Str::normalizeLineEndings($this->actual);

        Assert::assertThat($haystack, new StringContains($needle, false), $message);

        return $this;
    }

    /**
     * Asserts that two strings equality ignoring line endings
     *
     * Reference:
     * - https://github.com/sebastianbergmann/phpunit/pull/4670
     *
     * @param string $expected
     * @param string $message
     */
    public function stringEqualIgnoringLineEndings(string $expected, string $message = ''): self
    {
        $expected = Str::normalizeLineEndings($expected);
        $actual = Str::normalizeLineEndings($this->actual);

        Assert::assertThat($actual, new IsEqual($expected), $message);

        return $this;
    }

    /**
     * Asserts that the contents of one file is equal to the string.
     *
     * Reference:
     * - https://github.com/sebastianbergmann/phpunit/pull/4649
     *
     * @param string $expectedString
     * @param string $message
     */
    public function fileEqualsString(string $expectedString, string $message = ''): self
    {
        Assert::assertFileExists($this->actual, $message);

        $constraint = new IsEqual($expectedString);

        Assert::assertThat(file_get_contents($this->actual), $constraint, $message);

        return $this;
    }

    /**
     * @param string $expectedString
     * @param string $message
     */
    public function fileNotEqualsString(string $expectedString, string $message = ''): self
    {
        Assert::assertFileExists($this->actual, $message);

        $constraint = new LogicalNot(new IsEqual($expectedString));

        Assert::assertThat(file_get_contents($this->actual), $constraint, $message);

        return $this;
    }

    /**
     * @param string $expectedString
     * @param string $message
     */
    public function fileEqualsStringIgnoringCase(string $expectedString, string $message = ''): self
    {
        Assert::assertFileExists($this->actual, $message);

        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '9.0', '<')) {
            Assert::assertThat(
                file_get_contents($this->actual),
                new IsEqual($expectedString, 0.0, 10, false, true),
                $message
            );

            return $this;
        }
        // @codeCoverageIgnoreEnd

        $constraint = new IsEqualIgnoringCase($expectedString);

        Assert::assertThat(file_get_contents($this->actual), $constraint, $message);

        return $this;
    }

    /**
     * @param string $expectedString
     * @param string $message
     */
    public function fileNotEqualsStringIgnoringCase(string $expectedString, string $message = ''): self
    {
        Assert::assertFileExists($this->actual, $message);

        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '9.0', '<')) {
            $constraint = new LogicalNot(new IsEqual($expectedString, 0.0, 10, false, true));

            Assert::assertThat(file_get_contents($this->actual), $constraint, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        $constraint = new LogicalNot(new IsEqualIgnoringCase($expectedString));

        Assert::assertThat(file_get_contents($this->actual), $constraint, $message);

        return $this;
    }

    /**
     * @param string $selector
     * @param string $message
     */
    public function markupContainsSelector(string $selector, string $message = ''): self
    {
        Markup::assertContainsSelector($selector, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $selector
     * @param string $message
     */
    public function markupNotContainsSelector(string $selector, string $message = ''): self
    {
        Markup::assertNotContainsSelector($selector, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $contents
     * @param string $selector
     * @param string $message
     */
    public function markupElementContains(string $contents, string $selector = '', string $message = ''): self
    {
        Markup::assertElementContains($contents, $selector, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $contents
     * @param string $selector
     * @param string $message
     */
    public function markupElementNotContains(string $contents, string $selector = '', string $message = ''): self
    {
        Markup::assertElementNotContains($contents, $selector, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $regexp
     * @param string $selector
     * @param string $message
     */
    public function markupElementRegExp(string $regexp, string $selector = '', string $message = ''): self
    {
        Markup::assertElementRegExp($regexp, $selector, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $regexp
     * @param string $selector
     * @param string $message
     */
    public function markupElementNotRegExp(string $regexp, string $selector = '', string $message = ''): self
    {
        Markup::assertElementNotRegExp($regexp, $selector, $this->actual, $message);

        return $this;
    }

    /**
     * @param array  $attributes
     * @param string $message
     */
    public function markupHasElementWithAttributes(array $attributes = [], string $message = ''): self
    {
        Markup::assertHasElementWithAttributes($attributes, $this->actual, $message);

        return $this;
    }

    /**
     * @param array  $attributes
     * @param string $message
     */
    public function markupNotHasElementWithAttributes(array $attributes = [], string $message = ''): self
    {
        Markup::assertNotHasElementWithAttributes($attributes, $this->actual, $message);

        return $this;
    }

    /**
     * @param int    $count
     * @param string $selector
     * @param string $message
     */
    public function markupSelectorCount(int $count, string $selector, string $message = ''): self
    {
        Markup::assertSelectorCount($count, $selector, $this->actual, $message);

        return $this;
    }
}
