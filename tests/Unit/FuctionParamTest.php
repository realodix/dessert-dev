<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;
use Realodix\NextProject\Exception\InvalidActualValueException;
use Realodix\NextProject\Exception\InvalidArgumentException;
use Realodix\NextProject\Test\Fixtures\ObjectEquals\ValueObject;

final class FuctionParamTest extends TestCase
{
    /** @test */
    public function arrayHasKeyActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass('$errors')->hasKey(true);
    }

    /** @test */
    public function arrayHasKeyExpectedValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        ass([])->hasKey(true);
    }

    /** @test */
    public function arrayHasNotKeyActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass('$errors')->notHasKey(true);
    }

    /** @test */
    public function arrayHasNotKeyExpectedValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        ass([])->notHasKey(true);
    }

    /** @test */
    public function containsOnlyActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass('not_iterable')->containsOnly('');
    }

    /** @test */
    public function notContainsOnlyActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass('not_iterable')->notContainsOnly('');
    }

    /** @test */
    public function containsOnlyInstancesOfActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass('not_iterable')->containsOnlyInstancesOf('');
    }

    /** @test */
    public function countActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass('not_countable_or_iterable')->count(1);
    }

    /** @test */
    public function notCountActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass('not_countable_or_iterable')->notCount(1);
    }

    /** @test */
    public function classHasAttributeActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass('not_object')->classHasAttribute('');
    }

    /** @test */
    public function classNotHasAttributeActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass('not_object')->classNotHasAttribute('');
    }

    /** @test */
    public function classHasStaticAttributeActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass('')->classHasStaticAttribute('');
    }

    /** @test */
    public function classNotHasStaticAttributeActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass('')->classNotHasStaticAttribute('');
    }

    /** @test */
    public function isReadableActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->isReadable();
    }

    /** @test */
    public function isNotReadableActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->isNotReadable();
    }

    /** @test */
    public function isWritableActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->isWritable();
    }

    /** @test */
    public function isNotWritableActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->isNotWritable();
    }

    /** @test */
    public function directoryExistsActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->directoryExists();
    }

    /** @test */
    public function directoryDoesNotExistActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->directoryDoesNotExist();
    }

    /** @test */
    public function directoryIsReadableActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->directoryIsReadable();
    }

    /** @test */
    public function directoryIsNotReadableActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->directoryIsNotReadable();
    }

    /** @test */
    public function directoryIsWritableActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->directoryIsWritable();
    }

    /** @test */
    public function directoryIsNotWritableActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->directoryIsNotWritable();
    }

    /** @test */
    public function fileEqualsActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->fileEquals('');
    }

    /** @test */
    public function fileEqualsCanonicalizingActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->fileEqualsCanonicalizing('');
    }

    /** @test */
    public function fileNotEqualsCanonicalizingActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->fileNotEqualsCanonicalizing('');
    }

    /** @test */
    public function fileEqualsIgnoringCaseActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->fileEqualsIgnoringCase('');
    }

    /** @test */
    public function fileNotEqualsIgnoringCaseActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->fileNotEqualsIgnoringCase('');
    }

    /** @test */
    public function fileNotEqualsActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->fileNotEquals('');
    }

    /** @test */
    public function fileExistsActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->fileExists();
    }

    /** @test */
    public function fileDoesNotExistActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->fileDoesNotExist();
    }

    /** @test */
    public function fileIsReadableActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->fileIsReadable();
    }

    /** @test */
    public function fileIsNotReadableActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->fileIsNotReadable();
    }

    /** @test */
    public function fileIsWritableActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->fileIsWritable();
    }

    /** @test */
    public function fileIsNotWritableActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->fileIsNotWritable();
    }

    /** @test */
    public function instanceOfExpectedValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        ass('')->instanceOf('');
    }

    /** @test */
    public function notInstanceOfExpectedValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        ass('')->notInstanceOf('');
    }

    /** @test */
    public function jsonActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->json('');
    }

    /** @test */
    public function jsonFileEqualsJsonFileActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->jsonFileEqualsJsonFile('');
    }

    /** @test */
    public function jsonFileNotEqualsJsonFileActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->jsonFileNotEqualsJsonFile('');
    }

    /** @test */
    public function jsonStringEqualsJsonFileActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->jsonStringEqualsJsonFile('');
    }

    /** @test */
    public function jsonStringNotEqualsJsonFileActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->jsonStringNotEqualsJsonFile('');
    }

    /** @test */
    public function jsonStringEqualsJsonStringActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->jsonStringEqualsJsonString('');
    }

    /** @test */
    public function jsonStringNotEqualsJsonStringActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->jsonStringNotEqualsJsonString('');
    }

    /** @test */
    public function objectHasAttributeActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->objectHasAttribute('');
    }

    /** @test */
    public function objectNotHasAttributeActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->objectNotHasAttribute('');
    }

    /** @test */
    public function sameSizeActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass('')->sameSize('');
    }

    /** @test */
    public function sameSizeExpectedValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        ass([])->sameSize('');
    }

    /** @test */
    public function notSameSizeActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass('')->notSameSize('');
    }

    /** @test */
    public function notSameSizeExpectedValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        ass([])->notSameSize('');
    }

    /** @test */
    public function matchesRegularExpressionActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->matchesRegularExpression('');
    }

    /** @test */
    public function doesNotMatchRegularExpressionActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->doesNotMatchRegularExpression('');
    }

    /** @test */
    public function objectEqualsActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
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
        $this->expectException(InvalidActualValueException::class);
        ass(false)->stringContainsString('');
    }

    /** @test */
    public function stringNotContainsStringActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->stringNotContainsString('');
    }

    /** @test */
    public function stringEqualsFileCanonicalizingActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->stringEqualsFileCanonicalizing('');
    }

    /** @test */
    public function stringNotEqualsFileCanonicalizingActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->stringNotEqualsFileCanonicalizing('');
    }

    /** @test */
    public function stringEqualsFileIgnoringCaseActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->stringEqualsFileIgnoringCase('');
    }

    /** @test */
    public function stringNotEqualsFileIgnoringCaseActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->stringNotEqualsFileIgnoringCase('');
    }

    /** @test */
    public function stringContainsStringIgnoringCaseActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->stringContainsStringIgnoringCase('');
    }

    /** @test */
    public function stringNotContainsStringIgnoringCaseActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->stringNotContainsStringIgnoringCase('');
    }

    /** @test */
    public function stringMatchesFormatActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->stringMatchesFormat('');
    }

    /** @test */
    public function stringNotMatchesFormatActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->stringNotMatchesFormat('');
    }

    /** @test */
    public function stringMatchesFormatFileActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->stringMatchesFormatFile('');
    }

    /** @test */
    public function stringNotMatchesFormatFileActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->stringNotMatchesFormatFile('');
    }

    /** @test */
    public function stringStartsWithActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->stringStartsWith('');
    }

    /** @test */
    public function stringStartsNotWithActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->stringStartsNotWith('');
    }

    /** @test */
    public function stringEndsWithActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->stringEndsWith('');
    }

    /** @test */
    public function stringEndsNotWithActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->stringEndsNotWith('');
    }

    /** @test */
    public function xmlFileEqualsXmlFileActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->xmlFileEqualsXmlFile('');
    }

    /** @test */
    public function xmlFileNotEqualsXmlFileActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->xmlFileNotEqualsXmlFile('');
    }
}
