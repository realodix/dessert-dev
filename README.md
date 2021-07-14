# NextProject

![PHPVersion](https://img.shields.io/badge/PHP-^7.2|^8-777BB4.svg?style=flat-square)
![PHPUnitVersion](https://img.shields.io/badge/PHPUnit-^8.5|^9-3C9CD7.svg?style=flat-square)

A [PHPUnit](https://phpunit.de/) wrapper that makes your testing easier. It was carefully crafted to bring the joy of testing to PHP.

### Features
- Assertion chain
- Write your tests for PHPUnit 9.x and run them on PHPUnit 8.5 - 9.x

## Installation

#### Requirements

- PHP 7.2 or higher
- PHPUnit 8.5 or higher

#### Install the package

```sh
composer require realodix/next-project
```

## Usage

NextProject offers you five functions to write your tests: 

- `Assert::that($actual)`
- `ass($actual)`
- `expect($actual)`
- `should($actual)`
- `verify($actual)`

Use the one that best fits your test naming convention, or all five. They share the same behavior & syntax:

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

### Assertion Aliases

In addition to assertions, NextProject offers you a set of assertion aliases. Some APIs are inspired by [Jest](https://jestjs.io) & [Chai](https://www.chaijs.com) that allow you to write your tests like you would write natural sentences and some are simply shortened to speed you up writing tests.

For the full list of **assertion aliases**, please refer to [docs/AssertionAliases.md](/docs/AssertionAliases.md) documentation.

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
