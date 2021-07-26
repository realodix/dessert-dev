<?php

namespace Realodix\NextProject\Extend;

use Laminas\Dom\Query;
use PHPUnit\Framework\Assert;

/**
 * @internal
 */
final class AssertMarkup
{
    /**
     * Assert an element's contents contain the given regular expression pattern.
     *
     * @param string $regexp   The regular expression pattern to look for within the DOM node.
     * @param string $selector A query $selector for the element to find.
     * @param string $output   The $output that should contain the $selector.
     * @param string $message  A message to display if the assertion fails.
     */
    public static function assertElementRegExp(string $regexp, string $selector = '', string $output = '', string $message = '')
    {
        $matchedElements = self::getInnerHtmlOfMatchedElements($output, $selector);

        return ass($matchedElements)->matchesRegularExpression($regexp, $message);
    }

    /**
     * Assert an element's contents do not contain the given regular expression pattern.
     *
     * @param string $regexp   The regular expression pattern to look for within the DOM node.
     * @param string $selector A query $selector for the element to find.
     * @param string $output   The $output that should not contain the $selector.
     * @param string $message  A message to display if the assertion fails.
     */
    public static function assertElementNotRegExp(string $regexp, string $selector = '', string $output = '', string $message = '')
    {
        $matchedElements = self::getInnerHtmlOfMatchedElements($output, $selector);

        return ass($matchedElements)->doesNotMatchRegularExpression($regexp, $message);
    }

    /**
     * Given HTML markup and a DOM selector query, collect the innerHTML of the matched
     * selectors.
     *
     * @param string $markup The HTML for the DOMDocument.
     * @param string $query  The DOM selector query.
     *
     * @return string The concatenated innerHTML of any matched selectors.
     */
    protected static function getInnerHtmlOfMatchedElements(string $markup, string $query): string
    {
        $results = self::executeDomQuery($markup, $query);
        $contents = [];

        // Loop through results and collect their innerHTML values.
        foreach ($results as $result) {
            $document = new \DOMDocument;
            $document->appendChild($document->importNode($result->firstChild, true));

            $contents[] = trim($document->saveHTML());
        }

        return implode(PHP_EOL, $contents);
    }

    /**
     * Build a new DOMDocument from the given markup, then execute a query against it.
     *
     * @param string $content The HTML for the DOMDocument.
     * @param string $query   The DOM selector query.
     *
     * @return array
     */
    protected static function executeDomQuery(string $content, string $query)
    {
        return (new Query($content))->execute($query);
    }
}
