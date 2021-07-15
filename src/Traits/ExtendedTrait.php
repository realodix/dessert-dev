<?php

namespace Realodix\NextProject\Traits;

use Laminas\Dom\Query;
use PHPUnit\Framework\Assert as PHPUnit;
use Realodix\NextProject\Helpers\MarkupHelper;
use Realodix\NextProject\Helpers\ValidatorHelper as Validator;

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

    /**
     * Assert that the given string contains an element matching the given selector
     *
     * @param mixed  $selector     The output that should contain the $this->actual.
     * @param string $message      A message to display if the assertion fails.
     * @param mixed  $this->actual The output that should contain the $selector.
     */
    public function markupContainsSelector($selector, string $message = ''): self
    {
        if (is_array($selector)) {
            $selector = '*'.(new MarkupHelper)->flattenAttributeArray($selector);
        }

        $results = (new Query($this->actual))->execute($selector);

        PHPUnit::assertGreaterThan(0, count($results), $message);

        return $this;
    }

    /**
     * Assert an element's contents contain the given string.
     *
     * @param string $selector     A query selector for the element to find.
     * @param string $output       The output that should contain the $selector.
     * @param string $message      A message to display if the assertion fails.
     * @param mixed  $this->actual The string to look for within the DOM node's contents.
     */
    public function markupElementContains($selector = '', $output = '', $message = ''): self
    {
        $matchedElements = (new MarkupHelper)->getInnerHtmlOfMatchedElements($output, $selector);

        PHPUnit::assertStringContainsString($this->actual, $matchedElements, $message);

        return $this;
    }

    /**
     * Assert an element's contents do not contain the given string.
     *
     * @param string $selector     A query selector for the element to find.
     * @param string $output       The output that should not contain the $selector.
     * @param string $message      A message to display if the assertion fails.
     * @param mixed  $this->actual The string to look for within the DOM node's contents.
     */
    public function markupElementNotContains($selector = '', $output = '', $message = ''): self
    {
        $matchedElements = (new MarkupHelper)->getInnerHtmlOfMatchedElements($output, $selector);

        PHPUnit::assertStringNotContainsString($this->actual, $matchedElements, $message);

        return $this;
    }

    /**
     * Assert an element's contents do not contain the given regular expression pattern.
     *
     * @param string $selector     A query selector for the element to find.
     * @param string $output       The output that should not contain the $selector.
     * @param string $message      A message to display if the assertion fails.
     * @param string $this->actual The regular expression pattern to look for within the DOM node.
     */
    public function markupElementNotRegExp($selector = '', $output = '', $message = ''): self
    {
        $matchedElements = (new MarkupHelper)->getInnerHtmlOfMatchedElements($output, $selector);

        PHPUnit::assertDoesNotMatchRegularExpression($this->actual, $matchedElements, $message);

        return $this;
    }

    /**
     * Assert an element's contents contain the given regular expression pattern.
     *
     * @param string $selector     A query selector for the element to find.
     * @param string $output       The output that should contain the $selector.
     * @param string $message      A message to display if the assertion fails.
     * @param string $this->actual The regular expression pattern to look for within the DOM node.
     */
    public function markupElementRegExp($selector = '', $output = '', $message = ''): self
    {
        $matchedElements = (new MarkupHelper)->getInnerHtmlOfMatchedElements($output, $selector);

        PHPUnit::assertMatchesRegularExpression($this->actual, $matchedElements, $message);

        return $this;
    }

    /**
     * Assert that an element with the given attributes exists in the given markup.
     *
     * @param string $output       The output that should contain an element with the
     *                             provided $this->actual.
     * @param string $message      A message to display if the assertion fails.
     * @param array  $this->actual An array of HTML attributes that should be found on the element.
     */
    public function markupHasElementWithAttributes($output = '', string $message = ''): self
    {
        $this->markupContainsSelector($output, $message);

        return $this;
    }

    /**
     * Assert that the given string does not contain an element matching the given
     * selector
     *
     * @param mixed  $selector     The output that should not contain the $this->actual.
     * @param string $message      A message to display if the assertion fails.
     * @param array  $this->actual An array of HTML attributes that should be found on the element.
     */
    public function markupNotContainsSelector($selector, string $message = ''): self
    {
        if (is_array($selector)) {
            $selector = '*'.(new MarkupHelper)->flattenAttributeArray($selector);
        }

        $results = (new Query($this->actual))->execute($selector);

        PHPUnit::assertEquals(0, count($results), $message);

        return $this;
    }

    /**
     * Assert that an element with the given attributes does not exist in the given markup.
     *
     * @param string $output       The output that should not contain an element with the
     *                             provided $this->actual.
     * @param string $message      A message to display if the assertion fails.
     * @param array  $this->actual An array of HTML attributes that should be found on the element.
     */
    public function markupNotHasElementWithAttributes($output = '', string $message = ''): self
    {
        $this->markupNotContainsSelector($output, $message);

        return $this;
    }

    /**
     * Assert the number of times an element matching the given selector is found.
     *
     * @param string $selector     A query selector for the element to find.
     * @param string $output       The markup to run the assertion against.
     * @param string $message      A message to display if the assertion fails.
     * @param int    $this->actual The number of matching elements expected.
     */
    public function markupSelectorCount(string $selector, string $output = '', string $message = ''): self
    {
        $results = (new Query($output))->execute($selector);

        PHPUnit::assertCount($this->actual, $results, $message);

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
}
