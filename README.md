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

## Writing a Test

NextProject offers you six functions constructor to write your tests: 

- `Assert::that($actual)`
- `Check::that($actual)`
- `ass($actual)`
- `expect($actual)`
- `should($actual)`
- `verify($actual)`

Write test cases and test methods as usual, just switch to `Assert::that()` to write your
assertions. Use the one that best fits your test naming convention, or all. They share the
same behavior & syntax.

For the full list of **assertions**, please refer to [PHPUnit Assertions](https://phpunit.readthedocs.io/en/9.5/assertions.html) documentation.

```php
use Realodix\NextProject\Assert;

// Static method
Assert::that(1)
    ->isInt()       // $this->assertIsInt(1);
    ->isNotFloat(); // $this->assertIsFloat(1);


// Global function
verify(1)
    ->isInt()       // $this->assertIsInt(1);
    ->isNotFloat(); // $this->assertIsFloat(1);

verify([1, 2, 3])->each()
    ->isInt()
    ->and(true)
        ->true()
        ->notFalse();

// $this->assertIsInt(1);
// $this->assertIsInt(2);
// $this->assertIsInt(3);
// $this->assertTrue(true);
// $this->assertNotFalse(true);


// and many more !
```

For other usage examples, please see how We write tests for this package in the [/tests](/tests/Unit) folder.

### Assertion Aliases

In addition to assertions, NextProject offers you a set of assertion aliases. For the full list of **assertion aliases**, please refer to [assertion aliases](/docs/AssertionAliases.md) documentation.

## Expect exceptions

If your library still needs to support PHP 7.1 and therefore needs PHPUnit 7.5 for testing, this is a function you can use to support [`expectExceptionMessageMatches()`][testing-exceptions], [`expectError()`][testing-php-errors], [`expectWarning()`][testing-php-errors], [`expectNotice()`][testing-php-errors] and [`expectDeprecation()`][testing-php-errors].

```php
use Realodix\NextProject\Expect;

public function testException(): void
{
    Expect::after($this)
        ->exceptionMessageMatches('/^Exception/');

    throw new \Exception('Exception message');
}

public function testDeprecationCanBeExpected(): void
{
    Expect::after($this)
        ->deprecation();
        ->deprecationMessage('foo');
        ->deprecationMessageMatches('/foo/');

    \trigger_error('foo', \E_USER_DEPRECATED);
}

public function testNoticeCanBeExpected(): void
{
    Expect::after($this)
        ->notice();
        ->noticeMessage('foo');
        ->noticeMessageMatches('/foo/');

    \trigger_error('foo', \E_USER_NOTICE);
}

public function testWarningCanBeExpected(): void
{
    Expect::after($this)
        ->warning();
        ->warningMessage('foo');
        ->warningMessageMatches('/foo/');

    \trigger_error('foo', \E_USER_WARNING);
}

public function testErrorCanBeExpected(): void
{
    Expect::after($this)
        ->error();
        ->errorMessage('foo');
        ->errorMessageMatches('/foo/');

    \trigger_error('foo', \E_USER_ERROR);
}
```

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

[MIT License](/LICENSE)
