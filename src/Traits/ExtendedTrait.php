<?php

namespace Realodix\NextProject\Traits;

use Laminas\Dom\Query;
use PHPUnit\Framework\Assert as PHPUnit;
use Realodix\NextProject\Support\Markup;
use Realodix\NextProject\Support\Validator as Validator;

trait ExtendedTrait
{
    public function contains($needle, string $message = ''): self
    {
        if (is_string($this->actual)) {
            PHPUnit::assertStringContainsString($needle, $this->actual, $message);
        } else {
            PHPUnit::assertContains($needle, $this->actual, $message);
        }

        return $this;
    }

    public function notContains($needle, string $message = ''): self
    {
        if (is_string($this->actual)) {
            PHPUnit::assertStringNotContainsString($needle, $this->actual, $message);
        } else {
            PHPUnit::assertNotContains($needle, $this->actual, $message);
        }

        return $this;
    }

    public function stringEqualsFile(string $expected, string $message = ''): self
    {
        if (Validator::isJson($this->actual)) {
            PHPUnit::assertJsonStringEqualsJsonFile($expected, $this->actual, $message);

            return $this;
        }

        if (Validator::isXml($this->actual)) {
            PHPUnit::assertXmlStringEqualsXmlFile($expected, $this->actual, $message);

            return $this;
        }

        PHPUnit::assertStringEqualsFile($expected, $this->actual, $message);

        return $this;
    }

    public function stringNotEqualsFile(string $expected, string $message = ''): self
    {
        if (Validator::isJson($this->actual)) {
            PHPUnit::assertJsonStringNotEqualsJsonFile($expected, $this->actual, $message);

            return $this;
        }

        if (Validator::isXml($this->actual)) {
            PHPUnit::assertXmlStringNotEqualsXmlFile($expected, $this->actual, $message);

            return $this;
        }

        PHPUnit::assertStringNotEqualsFile($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Assert that the given string contains an element matching the given selector
     *
     * @uses $this->actual (string) The output that should contain the $selector.
     *
     * @param mixed  $selector The output that should contain the $this->actual.
     * @param string $message  A message to display if the assertion fails.
     */
    public function markupContainsSelector(string $selector, string $message = ''): self
    {
        $results = (new Query($this->actual))->execute($selector);

        PHPUnit::assertGreaterThan(0, count($results), $message);

        return $this;
    }

    /**
     * Assert that the given string does not contain an element matching the given
     * selector
     *
     * @uses $this->actual (string) The output that should not contain the $selector.
     *
     * @param mixed  $selector The output that should not contain the $this->actual.
     * @param string $message  A message to display if the assertion fails.
     */
    public function markupNotContainsSelector(string $selector, string $message = ''): self
    {
        $results = (new Query($this->actual))->execute($selector);

        PHPUnit::assertEquals(0, count($results), $message);

        return $this;
    }

    /**
     * Assert an element's contents contain the given string.
     *
     * @uses $this->actual (string) The output that should contain the $selector.
     *
     * @param string $contents The string to look for within the DOM node's contents.
     * @param string $selector A query selector for the element to find.
     * @param string $message  A message to display if the assertion fails.
     */
    public function markupElementContains(string $contents, string $selector = '', string $message = ''): self
    {
        $matchedElements = (new Markup)->getInnerHtmlOfMatchedElements($this->actual, $selector);

        PHPUnit::assertStringContainsString($contents, $matchedElements, $message);

        return $this;
    }

    /**
     * Assert an element's contents do not contain the given string.
     *
     * @uses $this->actual (string) The output that should not contain the $selector.
     *
     * @param string $contents The string to look for within the DOM node's contents.
     * @param string $selector A query selector for the element to find.
     * @param string $message  A message to display if the assertion fails.
     */
    public function markupElementNotContains(string $contents, string $selector = '', string $message = ''): self
    {
        $matchedElements = (new Markup)->getInnerHtmlOfMatchedElements($this->actual, $selector);

        PHPUnit::assertStringNotContainsString($contents, $matchedElements, $message);

        return $this;
    }

    /**
     * Assert an element's contents contain the given regular expression pattern.
     *
     * @uses $this->actual (string) The output that should contain the $selector.
     *
     * @param string $regexp   The regular expression pattern to look for within the DOM node.
     * @param string $selector A query selector for the element to find.
     * @param string $message  A message to display if the assertion fails.
     */
    public function markupElementRegExp(string $regexp, string $selector = '', string $message = ''): self
    {
        $output = $this->actual;
        $matchedElements = (new Markup)->getInnerHtmlOfMatchedElements($output, $selector);

        $this->and($matchedElements)->matchesRegularExpression($regexp, $message);

        return $this;
    }

    /**
     * Assert an element's contents do not contain the given regular expression pattern.
     *
     * @uses $this->actual (string) The output that should not contain the $selector.
     *
     * @param string $regexp   The regular expression pattern to look for within the DOM node.
     * @param string $selector A query selector for the element to find.
     * @param string $message  A message to display if the assertion fails.
     */
    public function markupElementNotRegExp(string $regexp, string $selector = '', string $message = ''): self
    {
        $output = $this->actual;
        $matchedElements = (new Markup)->getInnerHtmlOfMatchedElements($output, $selector);

        $this->and($matchedElements)->doesNotMatchRegularExpression($regexp, $message);

        return $this;
    }

    /**
     * Assert that an element with the given attributes exists in the given markup.
     *
     * @uses $this->actual (string) The output that should contain an element with the
     *                     provided $attributes.
     *
     * @param array  $attributes An array of HTML attributes that should be found on the element.
     * @param string $message    A message to display if the assertion fails.
     */
    public function markupHasElementWithAttributes(array $attributes = [], string $message = ''): self
    {
        $attributes = '*'.(new Markup)->flattenAttributeArray($attributes);

        $this->markupContainsSelector($attributes, $message);

        return $this;
    }

    /**
     * Assert that an element with the given attributes does not exist in the given
     * markup.
     *
     * @uses $this->actual (string) The output that should not contain an element with the
     *                     provided $attributes.
     *
     * @param array  $attributes An array of HTML attributes that should be found on the element.
     * @param string $message    A message to display if the assertion fails.
     */
    public function markupNotHasElementWithAttributes(array $attributes = [], string $message = ''): self
    {
        $attributes = '*'.(new Markup)->flattenAttributeArray($attributes);

        $this->markupNotContainsSelector($attributes, $message);

        return $this;
    }

    /**
     * Assert the number of times an element matching the given selector is found.
     *
     * @uses $this->actual (string) The markup to run the assertion against.
     *
     * @param int    $count    The number of matching elements expected.
     * @param string $selector A query selector for the element to find.
     * @param string $message  A message to display if the assertion fails.
     */
    public function markupSelectorCount(int $count, string $selector, string $message = ''): self
    {
        $results = (new Query($this->actual))->execute($selector);

        PHPUnit::assertCount($count, $results, $message);

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
}
