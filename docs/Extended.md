## Custom Behaviour

| Assertions              | Descriptions |
| ----------------------- | ------------ |
| `contains()`            | [`contains`][contains] or [`stringContainsString`][stringCS] |
| `notContains()`         | [`notContains`][contains] or [`stringNotContainsString`][stringCS] |
| `stringEquals()`        | [`equals`][equals] or [`jsonStringEqualsJsonString`][jsonSEJS] or [`xmlStringEqualsXmlString`][xmlSEXS] |
| `stringNotEquals()`     | [`notEquals`][equals] or [`jsonStringNotJsonString`][jsonSEJS] or [`xmlStringNotEqualsXmlString`][xmlSEXS] |
| `stringEqualsFile()`    | [`stringEqualsFile`][stringEF] or [`jsonStringEqualsJsonFile`][jsonSEJF] or [`xmlStringEqualsXmlFile`][xmlSEXF] |
| `stringNotEqualsFile()` | [`stringNotEqualsFile`][stringEF] or [`jsonStringNotEqualsJsonFile`][jsonSEJF] or [`xmlStringNotEqualsXmlFile`][xmlSEXF] |

[contains]: https://phpunit.readthedocs.io/en/stable/assertions.html#assertcontains
[stringCS]: https://phpunit.readthedocs.io/en/stable/assertions.html#assertstringcontainsstring
[equals]: https://phpunit.readthedocs.io/en/9.5/assertions.html#assertequals
[jsonSEJS]: https://phpunit.readthedocs.io/en/9.5/assertions.html#assertjsonstringequalsjsonstring
[xmlSEXS]: https://phpunit.readthedocs.io/en/9.5/assertions.html#assertxmlstringequalsxmlstring
[stringEF]: https://phpunit.readthedocs.io/en/stable/assertions.html#assertstringequalsfile
[jsonSEJF]: https://phpunit.readthedocs.io/en/stable/assertions.html#assertjsonstringequalsjsonfile
[xmlSEXF]: https://phpunit.readthedocs.io/en/stable/assertions.html#assertxmlstringequalsxmlfile

## Custom Assertions

| Assertions                                  | Descriptions |
| ------------------------------------------- | ------------ |
| `fileEqualsString()`                        ||
| `fileNotEqualsString()`                     ||
| `fileEqualsStringIgnoringCase()`            ||
| `fileNotEqualsStringIgnoringCase()`         ||
| `stringContainsStringIgnoringLineEndings()` ||
| `stringEqualIgnoringLineEndings()`          ||
| `markupContainsSelector()`                  | Assert that the given string contains an element matching the given selector. |
| `markupNotContainsSelector()`               | Assert that the given string does not contain an element matching the given selector. |
| `markupElementContains()`                   | Assert that the element with the given selector contains a string. |
| `markupElementNotContains()`                | Assert that the element with the given selector does not contain a string. |
| `markupElementRegExp()`                     | Assert that the element with the given selector contains a string. |
| `markupElementNotRegExp()`                  | Assert that the element with the given selector does not contain a string. |
| `markupHasElementWithAttributes()`          | Assert that an element with the given attributes exists in the given markup. |
| `markupNotHasElementWithAttributes()`       | Assert that an element with the given attributes does not exist in the given markup. |
| `markupSelectorCount()`                     | Assert the number of times an element matching the given selector is found. |
