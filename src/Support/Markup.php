<?php

namespace Realodix\NextProject\Support;

use Laminas\Dom\Query;
use PHPUnit\Framework\Assert as PHPUnit;

/**
 * @internal
 */
final class Markup
{
     /**
     * Assert that the given string contains an element matching the given selector
     *
     * @uses $this->actual (string) The output that should contain the $selector.
     *
     * @param mixed  $selector The output that should contain the $this->actual.
     * @param string $message  A message to display if the assertion fails.
     */
    public static function markupContainsSelector(string $selector, string $message = '')
    {
        $results = (new Query($this->actual))->execute($selector);

        return PHPUnit::assertGreaterThan(0, count($results), $message);

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
    public static function markupNotContainsSelector(string $selector, string $message = '')
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
    public static function markupElementContains(string $contents, string $selector = '', string $message = '')
    {
        $matchedElements = Markup::getInnerHtmlOfMatchedElements($this->actual, $selector);

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
    public static function markupElementNotContains(string $contents, string $selector = '', string $message = '')
    {
        $matchedElements = Markup::getInnerHtmlOfMatchedElements($this->actual, $selector);

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
    public static function markupElementRegExp(string $regexp, string $selector = '', string $message = '')
    {
        $output = $this->actual;
        $matchedElements = Markup::getInnerHtmlOfMatchedElements($output, $selector);

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
    public static function markupElementNotRegExp(string $regexp, string $selector = '', string $message = '')
    {
        $output = $this->actual;
        $matchedElements = Markup::getInnerHtmlOfMatchedElements($output, $selector);

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
    public static function markupHasElementWithAttributes(array $attributes = [], string $message = '')
    {
        $attributes = '*'.Markup::flattenAttributeArray($attributes);

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
    public static function markupNotHasElementWithAttributes(array $attributes = [], string $message = '')
    {
        $attributes = '*'.Markup::flattenAttributeArray($attributes);

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
    public static function markupSelectorCount(int $count, string $selector, string $message = '')
    {
        $results = (new Query($this->actual))->execute($selector);

        PHPUnit::assertCount($count, $results, $message);

        return $this;
    }

    /**
     * Given an array of HTML attributes, flatten them into a XPath attribute selector.
     *
     * @param array $attributes HTML attributes and their values.
     *
     * @return string A XPath attribute query selector.
     */
    public static function flattenAttributeArray(array $attributes): string
    {
        array_walk($attributes, function (&$value, $key) {
            // Boolean attributes.
            if (null === $value) {
                $value = sprintf('[%s]', $key);
            } else {
                $value = sprintf('[%s="%s"]', $key, htmlspecialchars($value));
            }
        });

        return implode('', $attributes);
    }

    /**
     * Given HTML markup and a DOM selector query, collect the innerHTML of the matched selectors.
     *
     * @param string $markup The HTML for the DOMDocument.
     * @param string $query  The DOM selector query.
     *
     * @return string The concatenated innerHTML of any matched selectors.
     */
    public static function getInnerHtmlOfMatchedElements(string $markup, string $query)
    {
        $results = (new Query($markup))->execute($query);
        $contents = [];

        // Loop through results and collect their innerHTML values.
        foreach ($results as $result) {
            $document = new \DOMDocument;
            $document->appendChild($document->importNode($result->firstChild, true));

            $contents[] = trim($document->saveHTML());
        }

        return implode(PHP_EOL, $contents);
    }
}
