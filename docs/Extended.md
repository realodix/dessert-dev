## Custom Behaviour

| Assertions              | Description |
| ----------------------- | ----------- |
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

| Assertions                                  |
| ------------------------------------------- |
| `fileEqualsString()`                        |
| `fileNotEqualsString()`                     |
| `fileEqualsStringIgnoringCase()`            |
| `fileNotEqualsStringIgnoringCase()`         |
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
