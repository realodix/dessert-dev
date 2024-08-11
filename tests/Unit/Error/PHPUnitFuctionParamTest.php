<?php

namespace Realodix\Dessert\Test\Error;

use PHPUnit\Framework\TestCase;
use Realodix\Dessert\Exceptions\InvalidActualValue;
use Realodix\Dessert\Test\Fixtures\ObjectEquals\ValueObject;

final class PHPUnitFuctionParamTest extends TestCase
{
    private function error()
    {
        return InvalidActualValue::class;
    }

    /** @test */
    public function arrayHasKeyActualValue(): void
    {
        $this->expectException($this->error());

        verify('$errors')->hasKey(true);
    }

    /** @test */
    public function arrayNotHasKeyActualValue(): void
    {
        $this->expectException($this->error());

        verify('$errors')->notHasKey(true);
    }

    /** @test */
    public function containsOnlyActualValue(): void
    {
        $this->expectException($this->error());

        verify('not_iterable')->containsOnly('');
    }

    /** @test */
    public function notContainsOnlyActualValue(): void
    {
        $this->expectException($this->error());

        verify('not_iterable')->notContainsOnly('');
    }

    /** @test */
    public function containsOnlyInstancesOfActualValue(): void
    {
        $this->expectException($this->error());

        verify('not_iterable')->containsOnlyInstancesOf('');
    }

    /** @test */
    public function countActualValue(): void
    {
        $this->expectException($this->error());

        verify('not_countable_or_iterable')->count(1);
    }

    /** @test */
    public function notCountActualValue(): void
    {
        $this->expectException($this->error());

        verify('not_countable_or_iterable')->notCount(1);
    }

    /** @test */
    public function directoryExistsActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->directoryExists();
    }

    /** @test */
    public function directoryDoesNotExistActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->directoryDoesNotExist();
    }

    /** @test */
    public function directoryIsReadableActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->directoryIsReadable();
    }

    /** @test */
    public function directoryIsNotReadableActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->directoryIsNotReadable();
    }

    /** @test */
    public function directoryIsWritableActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->directoryIsWritable();
    }

    /** @test */
    public function directoryIsNotWritableActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->directoryIsNotWritable();
    }

    /** @test */
    public function fileEqualsActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->fileEquals('');
    }

    /** @test */
    public function fileNotEqualsActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->fileNotEquals('');
    }

    /** @test */
    public function fileEqualsCanonicalizingActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->fileEqualsCanonicalizing('');
    }

    /** @test */
    public function fileNotEqualsCanonicalizingActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->fileNotEqualsCanonicalizing('');
    }

    /** @test */
    public function fileEqualsIgnoringCaseActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->fileEqualsIgnoringCase('');
    }

    /** @test */
    public function fileNotEqualsIgnoringCaseActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->fileNotEqualsIgnoringCase('');
    }

    /** @test */
    public function fileExistsActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->fileExists();
    }

    /** @test */
    public function fileDoesNotExistActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->fileDoesNotExist();
    }

    /** @test */
    public function fileIsReadableActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->fileIsReadable();
    }

    /** @test */
    public function fileIsNotReadableActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->fileIsNotReadable();
    }

    /** @test */
    public function fileIsWritableActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->fileIsWritable();
    }

    /** @test */
    public function fileIsNotWritableActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->fileIsNotWritable();
    }

    /** @test */
    public function instanceOfExpectedValue(): void
    {
        $this->expectException($this->error());

        verify('')->instanceOf(fooBar::class);
    }

    /** @test */
    public function notInstanceOfExpectedValue(): void
    {
        $this->expectException($this->error());

        verify('')->notInstanceOf(fooBar::class);
    }

    /** @test */
    public function isReadableActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->isReadable();
    }

    /** @test */
    public function isNotReadableActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->isNotReadable();
    }

    /** @test */
    public function isWritableActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->isWritable();
    }

    /** @test */
    public function isNotWritableActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->isNotWritable();
    }

    /** @test */
    public function jsonActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->json('');
    }

    /** @test */
    public function jsonFileEqualsJsonFileActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->jsonFileEqualsJsonFile('');
    }

    /** @test */
    public function jsonFileNotEqualsJsonFileActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->jsonFileNotEqualsJsonFile('');
    }

    /** @test */
    public function jsonStringEqualsJsonFileActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->jsonStringEqualsJsonFile('');
    }

    /** @test */
    public function jsonStringNotEqualsJsonFileActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->jsonStringNotEqualsJsonFile('');
    }

    /** @test */
    public function jsonStringEqualsJsonStringActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->jsonStringEqualsJsonString('');
    }

    /** @test */
    public function jsonStringNotEqualsJsonStringActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->jsonStringNotEqualsJsonString('');
    }

    /** @test */
    public function matchesRegularExpressionActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->matchesRegularExpression('');
    }

    /** @test */
    public function doesNotMatchRegularExpressionActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->doesNotMatchRegularExpression('');
    }

    /** @test */
    public function objectEqualsActualValue(): void
    {
        $this->expectException($this->error());

        verify('notObject')->objectEquals(new ValueObject(1));
    }

    /** @test */
    public function sameSizeActualValue(): void
    {
        $this->expectException($this->error());

        verify('')->sameSize([1]);
    }

    /** @test */
    public function notSameSizeActualValue(): void
    {
        $this->expectException($this->error());

        verify('')->notSameSize([1]);
    }

    /** @test */
    public function stringContainsStringActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringContainsString('');
    }

    /** @test */
    public function stringNotContainsStringActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringNotContainsString('');
    }

    /** @test */
    public function stringContainsStringIgnoringCaseActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringContainsStringIgnoringCase('');
    }

    /** @test */
    public function stringNotContainsStringIgnoringCaseActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringNotContainsStringIgnoringCase('');
    }

    /** @test */
    public function stringContainsStringIgnoringLineEndingsActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringContainsStringIgnoringLineEndings('');
    }

    /** @test */
    public function stringEqualsFileCanonicalizingActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringEqualsFileCanonicalizing('');
    }

    /** @test */
    public function stringNotEqualsFileCanonicalizingActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringNotEqualsFileCanonicalizing('');
    }

    /** @test */
    public function stringEqualsFileIgnoringCaseActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringEqualsFileIgnoringCase('');
    }

    /** @test */
    public function stringNotEqualsFileIgnoringCaseActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringNotEqualsFileIgnoringCase('');
    }

    /** @test */
    public function stringEqualIgnoringLineEndingsActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringEqualIgnoringLineEndings('');
    }

    /** @test */
    public function stringMatchesFormatActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringMatchesFormat('');
    }

    /** @test */
    public function stringNotMatchesFormatActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringNotMatchesFormat('');
    }

    /** @test */
    public function stringMatchesFormatFileActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringMatchesFormatFile('');
    }

    /** @test */
    public function stringNotMatchesFormatFileActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringNotMatchesFormatFile('');
    }

    /** @test */
    public function stringStartsWithActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringStartsWith('');
    }

    /** @test */
    public function stringStartsNotWithActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringStartsNotWith('');
    }

    /** @test */
    public function stringEndsWithActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringEndsWith('');
    }

    /** @test */
    public function stringEndsNotWithActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringEndsNotWith('');
    }

    /** @test */
    public function xmlFileEqualsXmlFileActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->xmlFileEqualsXmlFile('');
    }

    /** @test */
    public function xmlFileNotEqualsXmlFileActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->xmlFileNotEqualsXmlFile('');
    }
}
