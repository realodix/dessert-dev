# NextProject

![PHPVersion](https://img.shields.io/badge/PHP-^7.2|^8-777BB4.svg?style=flat-square)
![PHPUnitVersion](https://img.shields.io/badge/PHPUnit-^8.5|^9-3C9CD7.svg?style=flat-square)

A [PHPUnit](https://phpunit.de/) wrapper that makes your testing easier. It was carefully crafted to bring the joy of testing to PHP.

### Features
- Chain your check(s).
- **Forward-compatible**: Write your tests with the assertions supported by the latest PHPUnit version and run them on PHPUnit 8.5 - 9.x.
- **Less error-prone**: No more confusion about the order of the "expected" and "actual" values.

## Installation

#### Requirements

- PHP 7.2 or higher
- PHPUnit 8.5 or higher

#### Install the package

```sh
composer require --dev realodix/next-project
```

## Writing Tests

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


$user = User::find(1);

verify($user->getRate())
    ->greaterThan(5)
    ->lessThan(10)
    ->equals(7, 'first user rate is 7');

// $this->assertGreaterThan(5, $user->getRate());
// $this->assertLessThan(10, $user->getRate());
// $this->assertEquals(7, $user->getRate(), 'first user rate is 7');

// and many more !
```

For other usage examples, please see how We write tests for this package in the [/tests](/tests/Unit) folder.

### Assertion Aliases

In addition to assertions, NextProject offers you a set of assertion aliases. For the full list of **assertion aliases**, please refer to [assertion aliases](/docs/AssertionAliases.md) documentation.

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
