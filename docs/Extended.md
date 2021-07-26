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

### fileEqualsString()

Asserts that the contents of one file is equal to the string.

```php
verify($file)->fileEqualsString('expected_string', 'optional_message')
```

`fileNotEqualsString()` is the inverse of this assertion and takes the same arguments.

### fileEqualsStringIgnoringCase()

Asserts that the contents of one file is equal to the string (ignoring case).

```php
verify($file)->fileEqualsStringIgnoringCase('expected_string', 'optional_message')
```

`fileNotEqualsStringIgnoringCase()` is the inverse of this assertion and takes the same arguments.

### stringContainsStringIgnoringLineEndings()

Asserts string contains string (ignoring line endings).

```php
verify('oo')
    ->stringContainsStringIgnoringLineEndings('foo bar', 'optional_message')
```

### stringEqualIgnoringLineEndings()

Asserts that two strings equality (ignoring line endings).

```php
verify('a\r\nb')
    ->stringEqualIgnoringLineEndings('a\nb', 'optional_message')
```

### markupContainsSelector()
`markupContainsSelector(string $selector, string $message = '')`

```php
// Should find matching selectors
verify('<a href="https://example.com" id="my-link" class="link another-class">Example</a>')
    ->markupContainsSelector('#my-link');

// Should pick up multiple instances of a selector
verify('<a href="#home">Home</a> | <a href="#about">About</a> | <a href="#contact">Contact</a>')
    ->markupContainsSelector('a');

// Should verify that the given selector does not exist
verify('<h1 id="page-title" class="foo bar">This element has little to do with the link.</h1>')
    ->markupNotContainsSelector('#my-link');
```

`markupNotContainsSelector()` is the inverse of this assertion and takes the same arguments.

### markupElementContains()
`markupElementContains(string $contents, string $selector = '', string $message = '')`

```php
// Should be able to search for a selector
verify('<header>Lorem ipsum</header><div id="main">Lorem ipsum</div>')
    ->markupElementContains('ipsum', '#main');

// Should be able to chain multiple selectors
verify('<div id="main"><span class="foo">Lorem ipsum</span></div>')
    ->markupElementContains('ipsum', '#main .foo');

// Should be able to search for a selector
verify('<header>Foo bar baz</header><div id="main">Some string</div>')
    ->markupElementNotContains('ipsum', '#main');
```

`markupElementNotContains()` is the inverse of this assertion and takes the same arguments.

### markupElementRegExp()
`markupElementRegExp(string $regexp, string $selector = '', string $message = '')`

```php
// Should use regular expression matching
verify('<header>Lorem ipsum</header><div id="main">ABC123</div>')
    ->markupElementRegExp('/[A-Z0-9-]+/', '#main');

// Should be able to search for nested contents
verify('<header>Lorem ipsum</header><div id="main"><span>ABC</span></div>')
    ->markupElementRegExp('/[A-Z]+/', '#main');

// Should use regular expression matching
verify('<header>Foo bar baz</header><div id="main">ABC</div>')
    ->markupElementNotRegExp('/[0-9-]+/', '#main');
```

`markupElementNotRegExp()` is the inverse of this assertion and takes the same arguments.

### markupHasElementWithAttributes()
`markupHasElementWithAttributes(array $attributes = [], string $message = '')`

```php
// Should find an element with the given attributesSelectorCount
$expected = [
    'type'  => 'email',
    'value' => 'test@example.com',
];
$actual = '<label>Email</label><br><input type="email" value="test@example.com" />';

verify($actual)->markupHasElementWithAttributes($expected);

// Should be able to parse spaces in attribute values
$expected = [
    'data-attr' => 'foo bar baz',
];
$actual = '<div data-attr="foo bar baz">Contents</div>';

verify($actual)->markupHasElementWithAttributes($expected);

// Should ensure no element has the provided attributes
$expected = [
    'type'  => 'email',
    'value' => 'test@example.com',
];
$actual = '<label>City</label><br><input type="text" value="New York" data-foo="bar" />';

verify($actual)->markupNotHasElementWithAttributes($expected);
```

`markupNotHasElementWithAttributes()` is the inverse of this assertion and takes the same arguments.

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
