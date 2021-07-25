## Custom Behaviour

| Assertions              | Description |
| ----------------------- | ----------- |
| `contains()`            | [`contains`][contains] or [`stringContainsString`][stringCS] |
| `notContains()`         | [`notContains`][contains] or [`stringNotContainsString`][stringCS] |
| `stringEqualsFile()`    | [`stringEqualsFile`][stringEF] or [`jsonStringEqualsJsonFile`][jsonSEJF] or [`xmlStringEqualsXmlFile`][xmlSEXF] |
| `stringNotEqualsFile()` | [`stringNotEqualsFile`][stringEF] or [`jsonStringNotEqualsJsonFile`][jsonSEJF] or [`xmlStringNotEqualsXmlFile`][xmlSEXF] |

[contains]: https://phpunit.readthedocs.io/en/stable/assertions.html#assertcontains
[stringCS]: https://phpunit.readthedocs.io/en/stable/assertions.html#assertstringcontainsstring
[stringEF]: https://phpunit.readthedocs.io/en/stable/assertions.html#assertstringequalsfile
[jsonSEJF]: https://phpunit.readthedocs.io/en/stable/assertions.html#assertjsonstringequalsjsonfile
[xmlSEXF]: https://phpunit.readthedocs.io/en/stable/assertions.html#assertxmlstringequalsxmlfile

## Custom Assertions

| Assertions                                  |
| ------------------------------------------- |
| `fileEqualsString()`                        |
| `fileNotEqualsString()`                     |
| `fileEqualsStringIgnoringCase()`            |
| `fileNotEqualsStringIgnoringCase()`         |
| `stringEquals()`                            |
| `stringNotEquals()`                         |
| `stringContainsStringIgnoringLineEndings()` |
| `stringEqualIgnoringLineEndings()`          |
| `markupContainsSelector()`                  |
| `markupNotContainsSelector()`               |
| `markupElementContains()`                   |
| `markupElementNotContains()`                |
| `markupElementRegExp()`                     |
| `markupElementNotRegExp()`                  |
| `markupHasElementWithAttributes()`          |
| `markupNotHasElementWithAttributes()`       |
| `markupSelectorCount()`                     |
