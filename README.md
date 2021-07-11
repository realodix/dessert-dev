# NextProject

![PHPVersion](https://img.shields.io/badge/PHP-^7.1|^8-777BB4.svg?style=flat-square)
![PHPUnitVersion](https://img.shields.io/badge/PHPUnit-^7|^8|^9-3C9CD7.svg?style=flat-square)

A [PHPUnit](https://phpunit.de/) wrapper that makes your testing easier. It was carefully crafted to bring the joy of testing to PHP.

### Features
- Focus on simplicity.
- Forward-compatibility polyfill: Write your tests for PHPUnit 9.x and run them on PHPUnit 7.x - 9.x.

## Installation

#### Requirements

- PHP 7.1 or higher.
- PHPUnit 7.x - 9.x (automatically required via Composer).

#### Install the package

You can install the package via composer:

```sh
composer require realodix/next-project
```

## Usage

| PHPUnit                           | Shortcut |
| --------------------------------- | ----------- |
| `greaterThan()`                   | `isAbove()` \| `greater()` |
| `greaterThanOrEqual()`            | `isAtLeast()` \| `greaterOrEqual()` |
| `lessThan()`                      | `isBelow()` \| `less()` |
| `lessThanOrEqual()`               | `isAtMost()` \| `lessOrEqual()` |
| `matchesRegularExpression()`      | `match()` |
| `doesNotMatchRegularExpression()` | `notMatch()` |
| `directoryExists()`               | `dirExists()` |
| `directoryDoesNotExist()`         | `dirNotExist()` |
| `directoryIsReadable()`           | `dirReadable()` |
| `directoryIsNotReadable()`        | `dirNotReadable()` |
| `directoryIsWritable()`           | `dirWritable()` |
| `directoryIsNotWritable()`        | `dirNotWritable()` |
| `jsonFileEqualsJsonFile()`        | `jsonFileToFile()` |
| `jsonFileNotEqualsJsonFile()`     | `jsonFileNotToFile()` |
| `jsonStringEqualsJsonFile()`      | `jsonStringToFile()` |
| `jsonStringNotEqualsJsonFile()`   | `jsonStringNotToFile()` |
| `jsonStringEqualsJsonString()`    | `jsonStringToString()` |
| `jsonStringNotEqualsJsonString()` | `jsonStringNotToString()` |
| `xmlFileEqualsXmlFile()`          | `xmlFileToFile()` |
| `xmlFileNotEqualsXmlFile()`       | `xmlFileNotToFile()` |
| `xmlStringEqualsXmlFile()`        | `xmlStringTolFile()` |
| `xmlStringNotEqualsXmlFile()`     | `xmlStringNotToFile()` |
| `xmlStringEqualsXmlString()`      | `xmlStringToString()` |
| `xmlStringNotEqualsXmlString()`   | `xmlStringNotToString()` |

Use in any test `verify` function instead of `$this->assert*` methods:

```php
use Realodix\NextProject\Assert\Assert;

$user = User::find(1);

// equals
verify($user->getName())->equals('davert');

verify($user->getNumPosts())
    ->equals(5, 'user have 5 posts')
    ->notEquals(3);

// contains
Assert::Array($user->getRoles())
    ->contains('admin', 'first user is admin')
    ->notContains('banned', 'first user is not banned');


// greater / less
verify($user->getRate())
    ->greaterThan(5)
    ->lessThan(10)
    ->equals(7, 'first user rate is 7');

// true / false / null
verify($user->isAdmin())->true();
verify($user->isBanned())->false();
verify($user->invitedBy)->null();
verify($user->getPosts())->notNull();

// empty
verify($user->getComments())->empty();
verify($user->getRoles())->notEmpty();

// throws
Assert::Callable($callback)
    ->throws()
    ->throws(Exception::class)
    ->throws(Exception::class, 'exception message')
    ->throws(new Exception())
    ->throws(new Exception('message'));

// does not throw
Assert::Callable($callback)
    ->doesNotThrow()
    ->throws(Exception::class)
    ->doesNotThrow(new Exception());

// and many more !
```

## Extending

In order to add more assertions you can extend the abstract class `Verify`:

```php
use Realodix\NextProject\Assert\Assert;
use PHPUnit\Framework\Assert as PHPUnit;

class MyVerify extends Assert {

    //you can type $actual to only receive a specific data type

    public function __construct($actual = null)
    {
        parent::__construct($actual);
    }

    public function success(string $message = '')
    {
        PHPUnit::assertTrue(true, $message);
    }

}
```

And use it!

```php
$myVerify = new MyVerify;

$myVerify->success('it works!');

$myAssert::Mixed('this also')->notEquals('works');
```

## License

This package is licensed using the [MIT License](/LICENSE).
