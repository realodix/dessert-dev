<?php

namespace Realodix\NextProject\Helpers;

use PHPUnit\Framework\RiskyTestError;
use Laminas\Dom\Query;

/**
 * @internal
 */
final class MarkupHelper
{
    /**
     * Given an array of HTML attributes, flatten them into a XPath attribute selector.
     *
     * @throws RiskyTestError When the $attributes array is empty.
     *
     * @param array $attributes HTML attributes and their values.
     *
     * @return string A XPath attribute query selector.
     */
    public function flattenAttributeArray(array $attributes): string
    {
        if (empty($attributes)) {
            throw new RiskyTestError('Attributes array is empty.');
        }

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
     * @since 1.1.0
     *
     * @param string $markup The HTML for the DOMDocument.
     * @param string $query  The DOM selector query.
     *
     * @return string The concatenated innerHTML of any matched selectors.
     */
    public function getInnerHtmlOfMatchedElements($markup, $query)
    {
        $results  = (new Query($markup))->execute($query);
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
