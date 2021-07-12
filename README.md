# NextProject

![PHPVersion](https://img.shields.io/badge/PHP-^7.1|^8-777BB4.svg?style=flat-square)
![PHPUnitVersion](https://img.shields.io/badge/PHPUnit-6^|^7|^8|^9-3C9CD7.svg?style=flat-square)

A [PHPUnit](https://phpunit.de/) wrapper that makes your testing easier. It was carefully crafted to bring the joy of testing to PHP.

### Features
- Focus on simplicity.
- Forward-compatibility polyfill: Write your tests for PHPUnit 9.x and run them on PHPUnit 7.x - 9.x.

## Installation

#### Requirements

- PHP 7.1 or higher.
- PHPUnit 6.x - 9.x (automatically required via Composer).

#### Install the package

You can install the package via composer:

```sh
composer require realodix/next-project
```

## Usage

There are four flavors: `ass`, `expect`, `should`, and `verify`. All use the same chainable language to construct assertions.

Use the flavor provided in any test instead of the `$this->assert*` method:

```php
use Realodix\NextProject\Assert\Assert;

$user = User::find(1);

// equals
verify($user->getName())->equals('davert');

verify($user->getNumPosts())
    ->equals(5, 'user have 5 posts')
    ->notEquals(3);

// contains
verify($user->getRoles())
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

// and many more !
```

### Shortcut

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
| `directoryIsReadable()`           | `dirIsReadable()` |
| `directoryIsNotReadable()`        | `dirIsNotReadable()` |
| `directoryIsWritable()`           | `dirIsWritable()` |
| `directoryIsNotWritable()`        | `dirIsNotWritable()` |
| `jsonFileEqualsJsonFile()`        | `jsonFileToFile()` |
| `jsonFileNotEqualsJsonFile()`     | `jsonFileNotToFile()` |
| `jsonStringEqualsJsonFile()`      | `jsonStringToFile()` |
| `jsonStringNotEqualsJsonFile()`   | `jsonStringNotToFile()` |
| `jsonStringEqualsJsonString()`    | `jsonStringToString()` |
| `jsonStringNotEqualsJsonString()` | `jsonStringNotToString()` |
| `xmlFileEqualsXmlFile()`          | `xmlFileToFile()` |
| `xmlFileNotEqualsXmlFile()`       | `xmlFileNotToFile()` |
| `xmlStringEqualsXmlFile()`        | `xmlStringToFile()` |
| `xmlStringNotEqualsXmlFile()`     | `xmlStringNotToFile()` |
| `xmlStringEqualsXmlString()`      | `xmlStringToString()` |
| `xmlStringNotEqualsXmlString()`   | `xmlStringNotToString()` |

## Extending

In order to add more assertions you can extend the class `Assert`:

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

$myAssert::Mixed('this also')->notEquals('works');
```

## Improvements

There is guaranteed to be room for improvements. This package was not designed to do everything you might ever need. But if you feel like you require a feature, please submit a Pull Request. It's pretty easy since there's not much code, and the Go!

## License

This package is licensed using the [MIT License](/LICENSE).
