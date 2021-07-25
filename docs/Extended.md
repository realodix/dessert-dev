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

### markupContainsSelector()
`markupContainsSelector(string $selector, string $message = '')`

`markupNotContainsSelector()` is the inverse of this assertion and takes the same arguments.

### markupElementContains()
`markupElementContains(string $contents, string $selector = '', string $message = '')`

`markupElementNotContains()` is the inverse of this assertion and takes the same arguments.

### markupElementRegExp()
`markupElementRegExp(string $regexp, string $selector = '', string $message = '')`

`markupElementNotRegExp()` is the inverse of this assertion and takes the same arguments.

### markupHasElementWithAttributes()
`markupHasElementWithAttributes(array $attributes = [], string $message = '')`

`markupNotHasElementWithAttributes()` is the inverse of this assertion and takes the same arguments.

### markupSelectorCount()
`markupSelectorCount(int $count, string $selector, string $message = '')`
