<?php

namespace Realodix\NextProject\Traits;

use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\Constraint\IsEqualIgnoringCase;
use PHPUnit\Framework\Constraint\LogicalNot;
use PHPUnit\Framework\Constraint\StringContains;
use PHPUnit\Runner\Version as PHPUnitVersion;
use Realodix\NextProject\Support\Markup;
use Realodix\NextProject\Support\Modified;
use Realodix\NextProject\Support\Str;
use Realodix\NextProject\Support\Validator;

trait ExtendedTrait
{
    public function contains($needle, $message = ''): self
    {
        Modified::assertContains($needle, $this->actual, $message);

        return $this;
    }

    public function notContains($needle, $message = ''): self
    {
        Modified::assertNotContains($needle, $this->actual, $message);

        return $this;
    }

    public function stringEqualsFile($expectedFile, $message = ''): self
    {
        Modified::assertStringEqualsFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function stringNotEqualsFile($expectedFile, $message = ''): self
    {
        Modified::assertStringNotEqualsFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function stringEquals(string $expected, string $message = ''): self
    {
        if (Validator::isJson($this->actual)) {
            PHPUnit::assertJsonStringEqualsJsonString($expected, $this->actual, $message);

            return $this;
        }

        if (Validator::isXml($this->actual)) {
            PHPUnit::assertXmlStringEqualsXmlString($expected, $this->actual, $message);

            return $this;
        }

        PHPUnit::assertEquals($expected, $this->actual, $message);

        return $this;
    }

    public function stringNotEquals(string $expected, string $message = ''): self
    {
        if (Validator::isJson($this->actual)) {
            PHPUnit::assertJsonStringNotEqualsJsonString($expected, $this->actual, $message);

            return $this;
        }

        if (Validator::isXml($this->actual)) {
            PHPUnit::assertXmlStringNotEqualsXmlString($expected, $this->actual, $message);

            return $this;
        }

        PHPUnit::assertNotEquals($expected, $this->actual, $message);

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

        PHPUnit::assertThat($haystack, new StringContains($needle, false), $message);

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

        PHPUnit::assertThat($actual, new IsEqual($expected), $message);

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
        PHPUnit::assertFileExists($this->actual, $message);

        $constraint = new IsEqual($expectedString);

        PHPUnit::assertThat(file_get_contents($this->actual), $constraint, $message);

        return $this;
    }

    public function fileNotEqualsString(string $expectedString, string $message = ''): self
    {
        PHPUnit::assertFileExists($this->actual, $message);

        $constraint = new LogicalNot(new IsEqual($expectedString));

        PHPUnit::assertThat(file_get_contents($this->actual), $constraint, $message);

        return $this;
    }

    public function fileEqualsStringIgnoringCase(string $expectedString, string $message = ''): self
    {
        PHPUnit::assertFileExists($this->actual, $message);

        $constraint = new IsEqualIgnoringCase($expectedString);

        if (version_compare(PHPUnitVersion::series(), '9.0', '<')) {
            // @codeCoverageIgnoreStart
            $constraint = new IsEqual($expectedString, 0.0, 10, false, true);
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertThat(file_get_contents($this->actual), $constraint, $message);

        return $this;
    }

    public function fileNotEqualsStringIgnoringCase(string $expectedString, string $message = ''): self
    {
        PHPUnit::assertFileExists($this->actual, $message);

        $constraint = new LogicalNot(new IsEqualIgnoringCase($expectedString));

        if (version_compare(PHPUnitVersion::series(), '9.0', '<')) {
            // @codeCoverageIgnoreStart
            $constraint = new LogicalNot(new IsEqual($expectedString, 0.0, 10, false, true));
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertThat(file_get_contents($this->actual), $constraint, $message);

        return $this;
    }

    public function markupContainsSelector(string $selector, string $message = ''): self
    {
        Markup::assertContainsSelector($selector, $this->actual, $message);

        return $this;
    }

    public function markupNotContainsSelector(string $selector, string $message = ''): self
    {
        Markup::assertNotContainsSelector($selector, $this->actual, $message);

        return $this;
    }

    public function markupElementContains(string $contents, string $selector = '', string $message = ''): self
    {
        Markup::assertElementContains($contents, $selector, $this->actual, $message);

        return $this;
    }

    public function markupElementNotContains(string $contents, string $selector = '', string $message = ''): self
    {
        Markup::assertElementNotContains($contents, $selector, $this->actual, $message);

        return $this;
    }

    public function markupElementRegExp(string $regexp, string $selector = '', string $message = ''): self
    {
        Markup::assertElementRegExp($regexp, $selector, $this->actual, $message);

        return $this;
    }

    public function markupElementNotRegExp(string $regexp, string $selector = '', string $message = ''): self
    {
        Markup::assertElementNotRegExp($regexp, $selector, $this->actual, $message);

        return $this;
    }

    public function markupHasElementWithAttributes(array $attributes = [], string $message = ''): self
    {
        Markup::assertHasElementWithAttributes($attributes, $this->actual, $message);

        return $this;
    }

    public function markupNotHasElementWithAttributes(array $attributes = [], string $message = ''): self
    {
        Markup::assertNotHasElementWithAttributes($attributes, $this->actual, $message);

        return $this;
    }

    public function markupSelectorCount(int $count, string $selector, string $message = ''): self
    {
        Markup::assertSelectorCount($count, $selector, $this->actual, $message);

        return $this;
    }
}
