# NextProject

![PHPVersion](https://img.shields.io/badge/PHP-^7.2|^8-777BB4.svg?style=flat-square)
![PHPUnitVersion](https://img.shields.io/badge/PHPUnit-^8|^9-3C9CD7.svg?style=flat-square)

## Usage

Use in any test `verify` function instead of `$this->assert*` methods:

```php
use Codeception\Verify\Verify;

$user = User::find(1);

// equals
verify($user->getName())->equals('davert');

verify($user->getNumPosts())
    ->equals(5, 'user have 5 posts')
    ->notEquals(3);

// contains
Verify::Array($user->getRoles())
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
Verify::Callable($callback)
    ->throws()
    ->throws(Exception::class)
    ->throws(Exception::class, 'exception message')
    ->throws(new Exception())
    ->throws(new Exception('message'));

// does not throw
Verify::Callable($callback)
    ->doesNotThrow()
    ->throws(Exception::class)
    ->doesNotThrow(new Exception());

// and many more !
```

> 📄 **See Verifiers full list [here.](/docs/verifiers.md)**

## Alternative Syntax

If you follow TDD/BDD you'd rather use `expect` instead of `verify`:

```php
expect($user->getNumPosts())
    ->notToBeNull()
    ->toBeInt()
    ->toEqual(5, 'user have 5 posts');
```
> 📄 **See Expectations full list [here.](/docs/expectations.md)**


## Extending

In order to add more assertions you can extend the abstract class `Verify`:

```php
use Codeception\Verify\Verify;
use PHPUnit\Framework\Assert;

class MyVerify extends Verify {

    //you can type $actual to only receive a specific data type

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

$myVerify::Mixed('this also')->notEquals('works');
```

## License

This package is licensed using the [MIT License](/LICENSE).

## Credits

This project is inspired by and also replaces [Codeception/Verify](https://github.com/Codeception/Verify).
