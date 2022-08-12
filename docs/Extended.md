## Custom Behaviour

| Assertions              | Descriptions |
| ----------------------- | ------------ |
| `contains()`            | [`contains`][contains] or [`stringContainsString`][stringCS] |
| `notContains()`         | [`notContains`][contains] or [`stringNotContainsString`][stringCS] |
| `stringEqualsFile()`    | [`stringEqualsFile`][stringEF] or [`jsonStringEqualsJsonFile`][jsonSEJF] or [`xmlStringEqualsXmlFile`][xmlSEXF] |
| `stringNotEqualsFile()` | [`stringNotEqualsFile`][stringEF] or [`jsonStringNotEqualsJsonFile`][jsonSEJF] or [`xmlStringNotEqualsXmlFile`][xmlSEXF] |

[contains]: https://phpunit.readthedocs.io/en/9.5/assertions.html#assertcontains
[stringCS]: https://phpunit.readthedocs.io/en/9.5/assertions.html#assertstringcontainsstring
[stringEF]: https://phpunit.readthedocs.io/en/9.5/assertions.html#assertstringequalsfile
[jsonSEJF]: https://phpunit.readthedocs.io/en/9.5/assertions.html#assertjsonstringequalsjsonfile
[xmlSEXF]: https://phpunit.readthedocs.io/en/9.5/assertions.html#assertxmlstringequalsxmlfile

## Custom Assertions

| Assertions              | Descriptions |
| ----------------------- | ------------ |
| `stringEquals()`        | [`equals`][equals] or [`jsonStringEqualsJsonString`][jsonSEJS] or [`xmlStringEqualsXmlString`][xmlSEXS] |
| `stringNotEquals()`     | [`notEquals`][equals] or [`jsonStringNotJsonString`][jsonSEJS] or [`xmlStringNotEqualsXmlString`][xmlSEXS] |

[equals]: https://phpunit.readthedocs.io/en/9.5/assertions.html#assertequals
[jsonSEJS]: https://phpunit.readthedocs.io/en/9.5/assertions.html#assertjsonstringequalsjsonstring
[xmlSEXS]: https://phpunit.readthedocs.io/en/9.5/assertions.html#assertxmlstringequalsxmlstring

### fileEqualsString()

Asserts that the contents of one file is equal to the string.

```php
verify($file)
    ->fileEqualsString('expected_string', 'optional_message')
```

`fileNotEqualsString()` is the inverse of this assertion and takes the same arguments.

### fileEqualsStringIgnoringCase()

Asserts that the contents of one file is equal to the string (ignoring case).

```php
verify($file)
    ->fileEqualsStringIgnoringCase('expected_string', 'optional_message')
```

`fileNotEqualsStringIgnoringCase()` is the inverse of this assertion and takes the same arguments.

### hasLength()

Asserts that $number matches value's Length.

```php
verify('foo')->hasLength(3);

verify([1, 2, 3])->hasLength(3);
```

`notHasLength()` is the inverse of this assertion and takes the same arguments.

### markupContainsSelector()
`markupContainsSelector(string $selector, string $message = '')`

```php
$content = '
    <a href="https://example.com" id="my-link" class="link another-class">Example</a>
';

ass($content)
    // Should find matching selectors
    ->markupContainsSelector('#my-link')
    // Should verify that the given selector does not exist
    ->and('<span>foo bar</span>')
        ->markupNotContainsSelector('#my-link');
```

### markupElementContains()
`markupElementContains(string $contents, string $selector = '', string $message = '')`

```php
$content = '
    <div id="main"><span class="foo">Lorem ipsum</span></div>
';

ass($content)
    // Should be able to search for a selector
    ->markupElementContains('ipsum', '#main')
    // Should be able to chain multiple selectors
    ->markupElementContains('ipsum', '#main .foo')
    // Should be able to search for a selector
    ->markupElementNotContains('ipsum', '#foo');
```

### markupElementRegExp()
`markupElementRegExp(string $regexp, string $selector = '', string $message = '')`

```php
$content = '
    <div id="main">ABC123</div>
    <div id="sidebar"><span>ABC</span></div>
';

ass($content)
    // Should use regular expression matching
    ->markupElementRegExp('/[A-Z0-9-]+/', '#main')
    // Should be able to search for nested contents
    ->markupElementRegExp('/[A-Z]+/', '#sidebar')
    // Should use regular expression matching
    ->markupElementNotRegExp('/[0-9-]+/', '#sidebar');
```

### markupHasElementWithAttributes()
`markupHasElementWithAttributes(array $attributes = [], string $message = '')`

```php
$content = '
    <div data-attr="foo bar baz">
        <label>Email</label><br><input type="email" value="test@example.com" />
    </div>
';

verify($content)
    // Should find an element with the given attributesSelectorCount
    ->markupHasElementWithAttributes(['type' => 'email', 'value' => 'test@example.com'])
    // Should be able to parse spaces in attribute values
    ->markupHasElementWithAttributes(['data-attr' => 'foo bar baz'])
    // Should ensure no element has the provided attributes
    ->markupNotHasElementWithAttributes(['value' => 'foo@bar.com']);
```

### markupSelectorCount()
`markupSelectorCount(int $count, string $selector, string $message = '')`

```php
$content = '
  <ul>
    <li>1</li>
    <li>2</li>
    <li>3</li>
  </ul>
';

verify($content)->markupSelectorCount(3, 'li');
```
