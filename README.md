# NextProject

![PHPVersion](https://img.shields.io/badge/PHP-^7.1|^8-777BB4.svg?style=flat-square)
![PHPUnitVersion](https://img.shields.io/badge/PHPUnit-^7.5|^8|^9-3C9CD7.svg?style=flat-square)

A [PHPUnit](https://phpunit.de/) wrapper that makes your testing easier. It was carefully crafted to bring the joy of testing to PHP.

### Features
- **Chain your check(s)**
- **Forward-compatible**: Write your tests with the assertions supported by the latest PHPUnit version and run them on PHPUnit 7.5 - latest PHPUnit version.
- **Easy to upgrade**: Dropping support for an older PHPUnit version becomes as straight-forward as removing it from the version constraint in your `composer.json` file.
- **Less error-prone**: No more confusion about the order of the *actual*" and "*expected*" values.
- **Easy to troubleshoot**: Every failing check throws an Exception with a clear message status to ease your TDD experience.

## Installation

#### Requirements

- PHP 7.1 or higher
- PHPUnit 7.5 or higher

#### Install the package

```sh
composer require --dev realodix/next-project
```

## Writing Tests

NextProject offers you six functions to write your tests: 

- `Assert::that($actual)`
- `Check::that($actual)`
- `ass($actual)`
- `expect($actual)`
- `should($actual)`
- `verify($actual)`

Write test cases and test methods as usual, just switch to: e.g. `Assert::that()`, to write your
assertions. Use the one that best fits your test naming convention, or all. They share the
same behavior & syntax.

For the full list of **assertions**, please refer to [PHPUnit Assertions](https://phpunit.readthedocs.io/en/9.5/assertions.html) documentation.

```php
<?php

use Realodix\NextProject\Assert;
use PHPUnit\Framework\TestCase;

class YourTest extends TestCase
{
    public function test_with_static_method(): void
    {
        Assert::that(1)
            ->isInt()       // $this->assertIsInt(1);
            ->isNotFloat(); // $this->assertIsFloat(1);
    }

    public function test_global_function(): void
    {
        // Global function
        verify(1)
            ->isInt()       // $this->assertIsInt(1);
            ->isNotFloat(); // $this->assertIsFloat(1);

        verify([1, 2, 3])
            // Modifier to create an assertion on each item of the
            // given iterable
            ->each()
            ->isInt()
            // Pass a new value to the and function
            ->and(true)
                ->true()
                ->notFalse();
        
        // $this->assertIsInt(1);
        // $this->assertIsInt(2);
        // $this->assertIsInt(3);
        // $this->assertTrue(true);
        // $this->assertNotFalse(true);
    }

    // and many more !
}
```

For other usage examples, please see how We write tests for this package in the [/tests](/tests/Unit) folder.

### Modifier

#### and($actualValue)

Pass a new value to the `and()` function to chain multiple expectations in a single test:

```php
expect($id)->toBe(14)->and($name)->toBe('Nuno');
```

### Assertion Aliases

In addition to assertions, NextProject offers you a set of assertion aliases. For the full list of **assertion aliases**, please refer to [assertion aliases](/docs/AssertionAliases.md) documentation.

## Testing Exceptions, Errors, Warnings, and Notices

If your library still needs to support PHP 7.1 and therefore needs PHPUnit 7.5 for testing, then use the [`ExpectException`][src-expect] trait to support [`expectExceptionMessageMatches()`][testing-exceptions], [`expectError()`][testing-php-errors], [`expectWarning()`][testing-php-errors], [`expectNotice()`][testing-php-errors] and [`expectDeprecation()`][testing-php-errors].

```php
<?php

use PHPUnit\Framework\TestCase;
use Realodix\NextProject\Support\ExpectException;

class ErrorTest extends TestCase
{
    use ExpectException;

    // ..
}
```

When you don't need [`ExpectException`][src-expect] on the PHPUnit version > 8.4.0 on which the tests are being run, the autoloader will automatically load an empty trait with that same name, so you can safely use these trait in tests which need to be PHPUnit cross-version compatible.

[src-expect]: /src/Support/ExpectException.php
[testing-exceptions]: https://phpunit.readthedocs.io/en/stable/writing-tests-for-phpunit.html#testing-exceptions
[testing-php-errors]: https://phpunit.readthedocs.io/en/stable/writing-tests-for-phpunit.html#testing-php-errors-warnings-and-notices

## Extending

In order to add more assertions you can extend the [`Assertion`](/src/Assertion.php) class:

```php
use Realodix\NextProject\Assertion;
use PHPUnit\Framework\Assert;

class MyVerify extends Assertion {

    public function __construct($actual = null)
    {
        parent::__construct($actual);
    }

    public function success(string $message = '')
    {
        Assert::assertTrue(true, $message);
    }
}
```

And use it!

```php
$myVerify = new MyVerify;

$myVerify->success('it works!');

Assert::that('this also')->notEquals('works');
```

## Improvements

There is guaranteed to be room for improvements. This package was not designed to do
everything you might ever need. But if you feel like you require a feature, please submit
a Pull Request.

## License

NextProject is an open-sourced software licensed under the [MIT License](/LICENSE)
