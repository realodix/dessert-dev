<?php

namespace Realodix\NextProject\Test\Error;

use PHPUnit\Framework\TestCase;
use Realodix\NextProject\Exception\InvalidActualValueException;
use Realodix\NextProject\Exception\InvalidArgumentException;
use Realodix\NextProject\Expect;
use Realodix\NextProject\Test\Fixtures\ObjectEquals\ValueObject;

final class FuctionParamTest extends TestCase
{
    /** @test */
    public function arrayHasKeyActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass('$errors')->hasKey(true);
    }

    /** @test */
    public function arrayHasKeyExpectedValue(): void
    {
        Expect::after($this)
            ->exception(InvalidArgumentException::class);

        ass([])->hasKey(true);
    }

    /** @test */
    public function arrayHasNotKeyActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass('$errors')->notHasKey(true);
    }

    /** @test */
    public function arrayHasNotKeyExpectedValue(): void
    {
        Expect::after($this)
            ->exception(InvalidArgumentException::class);

        ass([])->notHasKey(true);
    }

    /** @test */
    public function containsOnlyActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass('not_iterable')->containsOnly('');
    }

    /** @test */
    public function notContainsOnlyActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass('not_iterable')->notContainsOnly('');
    }

    /** @test */
    public function containsOnlyInstancesOfActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass('not_iterable')->containsOnlyInstancesOf('');
    }

    /** @test */
    public function countActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass('not_countable_or_iterable')->count(1);
    }

    /** @test */
    public function notCountActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass('not_countable_or_iterable')->notCount(1);
    }

    /** @test */
    public function classHasAttributeActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass('not_object')->classHasAttribute('');
    }

    /** @test */
    public function classNotHasAttributeActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass('not_object')->classNotHasAttribute('');
    }

    /** @test */
    public function classHasStaticAttributeActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass('')->classHasStaticAttribute('');
    }

    /** @test */
    public function classNotHasStaticAttributeActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass('')->classNotHasStaticAttribute('');
    }

    /** @test */
    public function isReadableActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->isReadable();
    }

    /** @test */
    public function isNotReadableActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->isNotReadable();
    }

    /** @test */
    public function isWritableActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->isWritable();
    }

    /** @test */
    public function isNotWritableActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->isNotWritable();
    }

    /** @test */
    public function directoryExistsActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->directoryExists();
    }

    /** @test */
    public function directoryDoesNotExistActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->directoryDoesNotExist();
    }

    /** @test */
    public function directoryIsReadableActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->directoryIsReadable();
    }

    /** @test */
    public function directoryIsNotReadableActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->directoryIsNotReadable();
    }

    /** @test */
    public function directoryIsWritableActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->directoryIsWritable();
    }

    /** @test */
    public function directoryIsNotWritableActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->directoryIsNotWritable();
    }

    /** @test */
    public function fileEqualsActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->fileEquals('');
    }

    /** @test */
    public function fileEqualsCanonicalizingActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->fileEqualsCanonicalizing('');
    }

    /** @test */
    public function fileNotEqualsCanonicalizingActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->fileNotEqualsCanonicalizing('');
    }

    /** @test */
    public function fileEqualsIgnoringCaseActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->fileEqualsIgnoringCase('');
    }

    /** @test */
    public function fileNotEqualsIgnoringCaseActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->fileNotEqualsIgnoringCase('');
    }

    /** @test */
    public function fileNotEqualsActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->fileNotEquals('');
    }

    /** @test */
    public function fileExistsActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->fileExists();
    }

    /** @test */
    public function fileDoesNotExistActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->fileDoesNotExist();
    }

    /** @test */
    public function fileIsReadableActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->fileIsReadable();
    }

    /** @test */
    public function fileIsNotReadableActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->fileIsNotReadable();
    }

    /** @test */
    public function fileIsWritableActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->fileIsWritable();
    }

    /** @test */
    public function fileIsNotWritableActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->fileIsNotWritable();
    }

    /** @test */
    public function instanceOfExpectedValue(): void
    {
        Expect::after($this)
            ->exception(InvalidArgumentException::class);

        ass('')->instanceOf('');
    }

    /** @test */
    public function notInstanceOfExpectedValue(): void
    {
        Expect::after($this)
            ->exception(InvalidArgumentException::class);

        ass('')->notInstanceOf('');
    }

    /** @test */
    public function jsonActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->json('');
    }

    /** @test */
    public function jsonFileEqualsJsonFileActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->jsonFileEqualsJsonFile('');
    }

    /** @test */
    public function jsonFileNotEqualsJsonFileActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->jsonFileNotEqualsJsonFile('');
    }

    /** @test */
    public function jsonStringEqualsJsonFileActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->jsonStringEqualsJsonFile('');
    }

    /** @test */
    public function jsonStringNotEqualsJsonFileActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->jsonStringNotEqualsJsonFile('');
    }

    /** @test */
    public function jsonStringEqualsJsonStringActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->jsonStringEqualsJsonString('');
    }

    /** @test */
    public function jsonStringNotEqualsJsonStringActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->jsonStringNotEqualsJsonString('');
    }

    /** @test */
    public function objectHasAttributeActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->objectHasAttribute('');
    }

    /** @test */
    public function objectNotHasAttributeActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->objectNotHasAttribute('');
    }

    /** @test */
    public function sameSizeActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass('')->sameSize('');
    }

    /** @test */
    public function sameSizeExpectedValue(): void
    {
        Expect::after($this)
            ->exception(InvalidArgumentException::class);

        ass([])->sameSize('');
    }

    /** @test */
    public function notSameSizeActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass('')->notSameSize('');
    }

    /** @test */
    public function notSameSizeExpectedValue(): void
    {
        Expect::after($this)
            ->exception(InvalidArgumentException::class);

        ass([])->notSameSize('');
    }

    /** @test */
    public function matchesRegularExpressionActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->matchesRegularExpression('');
    }

    /** @test */
    public function doesNotMatchRegularExpressionActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->doesNotMatchRegularExpression('');
    }

    /** @test */
    public function objectEqualsActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->objectEquals('');
    }

    /** @test */
    public function objectEqualsExpextedValue(): void
    {
        $this->expectException(\TypeError::class);
        ass(new ValueObject(1))->objectEquals('');
    }

    /** @test */
    public function stringContainsStringActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->stringContainsString('');
    }

    /** @test */
    public function stringNotContainsStringActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->stringNotContainsString('');
    }

    /** @test */
    public function stringEqualsFileCanonicalizingActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->stringEqualsFileCanonicalizing('');
    }

    /** @test */
    public function stringNotEqualsFileCanonicalizingActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->stringNotEqualsFileCanonicalizing('');
    }

    /** @test */
    public function stringEqualsFileIgnoringCaseActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->stringEqualsFileIgnoringCase('');
    }

    /** @test */
    public function stringNotEqualsFileIgnoringCaseActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->stringNotEqualsFileIgnoringCase('');
    }

    /** @test */
    public function stringContainsStringIgnoringCaseActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->stringContainsStringIgnoringCase('');
    }

    /** @test */
    public function stringNotContainsStringIgnoringCaseActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->stringNotContainsStringIgnoringCase('');
    }

    /** @test */
    public function stringMatchesFormatActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->stringMatchesFormat('');
    }

    /** @test */
    public function stringNotMatchesFormatActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->stringNotMatchesFormat('');
    }

    /** @test */
    public function stringMatchesFormatFileActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->stringMatchesFormatFile('');
    }

    /** @test */
    public function stringNotMatchesFormatFileActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->stringNotMatchesFormatFile('');
    }

    /** @test */
    public function stringStartsWithActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->stringStartsWith('');
    }

    /** @test */
    public function stringStartsNotWithActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->stringStartsNotWith('');
    }

    /** @test */
    public function stringEndsWithActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->stringEndsWith('');
    }

    /** @test */
    public function stringEndsNotWithActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->stringEndsNotWith('');
    }

    /** @test */
    public function xmlFileEqualsXmlFileActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->xmlFileEqualsXmlFile('');
    }

    /** @test */
    public function xmlFileNotEqualsXmlFileActualValue(): void
    {
        Expect::after($this)
            ->exception(InvalidActualValueException::class);

        ass(false)->xmlFileNotEqualsXmlFile('');
    }
}
