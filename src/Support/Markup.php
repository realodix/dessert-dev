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
     * @param string $selector A query selector for the element to find.
     * @param string $output   The output that should contain the $selector.
     * @param string $message  A message to display if the assertion fails.
     */
    public static function assertContainsSelector(string $selector, $output = '', string $message = '')
    {
        $results = (new Query($output))->execute($selector);

        PHPUnit::assertGreaterThan(0, count($results), $message);

        return $this;
    }

    /**
     * Assert that the given string does not contain an element matching the given
     * selector
     *
     * @param string $selector A query selector for the element to find.
     * @param string $output   The output that should not contain the $selector.
     * @param string $message  A message to display if the assertion fails.
     */
    public static function assertNotContainsSelector(string $selector, $output = '', string $message = '')
    {
        $results = (new Query($output))->execute($selector);

        PHPUnit::assertEquals(0, count($results), $message);

        return $this;
    }

    /**
     * Assert an element's contents contain the given string.
     *
     * @param string $contents The string to look for within the DOM node's contents.
     * @param string $selector A query selector for the element to find.
     * @param string $message  A message to display if the assertion fails.
     */
    public static function assertElementContains(string $contents, string $selector = '', $output = '', $message = '')
    {
        $matchedElements = self::getInnerHtmlOfMatchedElements($output, $selector);

        PHPUnit::assertStringContainsString($contents, $matchedElements, $message);

        return $this;
    }

    /**
     * Assert an element's contents do not contain the given string.
     *
     * @param string $contents The string to look for within the DOM node's contents.
     * @param string $selector A query selector for the element to find.
     * @param string $output   The output that should not contain the $selector.
     * @param string $message  A message to display if the assertion fails.
     */
    public static function assertElementNotContains(string $contents, string $selector = '', $output = '', $message = '')
    {
        $matchedElements = self::getInnerHtmlOfMatchedElements($output, $selector);

        PHPUnit::assertStringNotContainsString($contents, $matchedElements, $message);

        return $this;
    }

    /**
     * Assert an element's contents contain the given regular expression pattern.
     *
     * @param string $regexp   The regular expression pattern to look for within the DOM node.
     * @param string $selector A query selector for the element to find.
     * @param string $output   The output that should contain the $selector.
     * @param string $message  A message to display if the assertion fails.
     */
    public static function assertElementRegExp(string $regexp, string $selector = '', $output = '', $message = '')
    {
        $matchedElements = self::getInnerHtmlOfMatchedElements($output, $selector);

        $this->and($matchedElements)->matchesRegularExpression($regexp, $message);

        return $this;
    }

    /**
     * Assert an element's contents do not contain the given regular expression pattern.
     *
     * @param string $regexp   The regular expression pattern to look for within the DOM node.
     * @param string $selector A query selector for the element to find.
     * @param string $output   The output that should not contain the $selector.
     * @param string $message  A message to display if the assertion fails.
     */
    public static function assertElementNotRegExp(string $regexp, string $selector = '', $output = '', $message = '')
    {
        $matchedElements = self::getInnerHtmlOfMatchedElements($output, $selector);

        $this->and($matchedElements)->doesNotMatchRegularExpression($regexp, $message);

        return $this;
    }

    /**
     * Assert that an element with the given attributes exists in the given markup.
     *
     * @param array  $attributes An array of HTML attributes that should be found on the element.
     * @param string $output     The output that should contain an element with the
     *                           provided $attributes.
     * @param string $message    A message to display if the assertion fails.
     */
    public static function assertHasElementWithAttributes(array $attributes = [], $output = '', $message = '')
    {
        $attributes = '*'.self::flattenAttributeArray($attributes);

        $this->assertContainsSelector($attributes, $output, $message);

        return $this;
    }

    /**
     * Assert that an element with the given attributes does not exist in the given
     * markup.
     *
     * @param array  $attributes An array of HTML attributes that should be found on the element.
     * @param string $output     The output that should not contain an element with the
     *                           provided $attributes.
     * @param string $message    A message to display if the assertion fails.
     */
    public static function assertNotHasElementWithAttributes(array $attributes = [], $output = '', $message = '')
    {
        $attributes = '*'.self::flattenAttributeArray($attributes);

        $this->assertNotContainsSelector($attributes, $output, $message);

        return $this;
    }

    /**
     * Assert the number of times an element matching the given selector is found.
     *
     * @param int    $count    The number of matching elements expected.
     * @param string $selector A query selector for the element to find.
     * @param string $output   The markup to run the assertion against.
     * @param string $message  A message to display if the assertion fails.
     */
    public static function assertSelectorCount(int $count, string $selector, $output = '', $message = '')
    {
        $results = (new Query($output))->execute($selector);

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
