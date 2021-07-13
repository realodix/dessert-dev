# NextProject

![PHPVersion](https://img.shields.io/badge/PHP-^7.1|^8-777BB4.svg?style=flat-square)
![PHPUnitVersion](https://img.shields.io/badge/PHPUnit-6^|^7|^8|^9-3C9CD7.svg?style=flat-square)

A [PHPUnit](https://phpunit.de/) wrapper that makes your testing easier. It was carefully crafted to bring the joy of testing to PHP.

### Features
- Assertion chain.
- Forward-compatibility: Write your tests for PHPUnit 9.x and run them on PHPUnit 6.x - 9.x.

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

There are five flavors: 
- `Assert::that($actual)`
- `ass($actual)`
- `expect($actual)`
- `should($actual)`
- `verify($actual)`

Use in any test instead of the `$this->assert*` method.

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

$myAssert::Mixed('this also')->notEquals('works');
```

## Improvements

There is guaranteed to be room for improvements. This package was not designed to do
everything you might ever need. But if you feel like you require a feature, please submit
a Pull Request. It's pretty easy since there's not much code, and the Go!

## License

[MIT License](/LICENSE)
