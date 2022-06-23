<?php

namespace Realodix\NextProject\Test\Error;

use PHPUnit\Framework\TestCase;
use Realodix\NextProject\Test\Fixtures\ObjectEquals\ValueObject;

final class PHPUnitFuctionParamTest extends TestCase
{
    private function error() {
        return \TypeError::class;
    }

    /** @test */
    public function arrayHasKeyActualValue(): void
    {
        $this->expectException($this->error());

        ass('$errors')->hasKey(true);
    }

    /** @test */
    public function arrayHasKeyExpectedValue(): void
    {
        $this->expectException($this->error());

        ass([])->hasKey(true);
    }

    /** @test */
    public function arrayHasNotKeyActualValue(): void
    {
        $this->expectException($this->error());

        ass('$errors')->notHasKey(true);
    }

    /** @test */
    public function arrayHasNotKeyExpectedValue(): void
    {
        $this->expectException($this->error());

        ass([])->notHasKey(true);
    }

    /** @test */
    public function containsOnlyActualValue(): void
    {
        $this->expectException($this->error());

        ass('not_iterable')->containsOnly('');
    }

    /** @test */
    public function notContainsOnlyActualValue(): void
    {
        $this->expectException($this->error());

        ass('not_iterable')->notContainsOnly('');
    }

    /** @test */
    public function containsOnlyInstancesOfActualValue(): void
    {
        $this->expectException($this->error());

        ass('not_iterable')->containsOnlyInstancesOf('');
    }

    /** @test */
    public function countActualValue(): void
    {
        $this->expectException($this->error());

        ass('not_countable_or_iterable')->count(1);
    }

    /** @test */
    public function notCountActualValue(): void
    {
        $this->expectException($this->error());

        ass('not_countable_or_iterable')->notCount(1);
    }

    /** @test */
    public function directoryExistsActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->directoryExists();
    }

    /** @test */
    public function directoryDoesNotExistActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->directoryDoesNotExist();
    }

    /** @test */
    public function directoryIsReadableActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->directoryIsReadable();
    }

    /** @test */
    public function directoryIsNotReadableActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->directoryIsNotReadable();
    }

    /** @test */
    public function directoryIsWritableActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->directoryIsWritable();
    }

    /** @test */
    public function directoryIsNotWritableActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->directoryIsNotWritable();
    }

    /** @test */
    public function fileEqualsActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->fileEquals('');
    }

    /** @test */
    public function fileNotEqualsActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->fileNotEquals('');
    }

    /** @test */
    public function fileEqualsCanonicalizingActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->fileEqualsCanonicalizing('');
    }

    /** @test */
    public function fileNotEqualsCanonicalizingActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->fileNotEqualsCanonicalizing('');
    }

    /** @test */
    public function fileEqualsIgnoringCaseActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->fileEqualsIgnoringCase('');
    }

    /** @test */
    public function fileNotEqualsIgnoringCaseActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->fileNotEqualsIgnoringCase('');
    }

    /** @test */
    public function fileExistsActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->fileExists();
    }

    /** @test */
    public function fileDoesNotExistActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->fileDoesNotExist();
    }

    /** @test */
    public function fileIsReadableActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->fileIsReadable();
    }

    /** @test */
    public function fileIsNotReadableActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->fileIsNotReadable();
    }

    /** @test */
    public function fileIsWritableActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->fileIsWritable();
    }

    /** @test */
    public function fileIsNotWritableActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->fileIsNotWritable();
    }

    /** @test */
    public function instanceOfExpectedValue(): void
    {
        $this->expectException($this->error());

        ass('')->instanceOf('');
    }

    /** @test */
    public function notInstanceOfExpectedValue(): void
    {
        $this->expectException($this->error());

        ass('')->notInstanceOf('');
    }

    /** @test */
    public function isReadableActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->isReadable();
    }

    /** @test */
    public function isNotReadableActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->isNotReadable();
    }

    /** @test */
    public function isWritableActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->isWritable();
    }

    /** @test */
    public function isNotWritableActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->isNotWritable();
    }

    /** @test */
    public function jsonActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->json('');
    }

    /** @test */
    public function jsonFileEqualsJsonFileActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->jsonFileEqualsJsonFile('');
    }

    /** @test */
    public function jsonFileNotEqualsJsonFileActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->jsonFileNotEqualsJsonFile('');
    }

    /** @test */
    public function jsonStringEqualsJsonFileActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->jsonStringEqualsJsonFile('');
    }

    /** @test */
    public function jsonStringNotEqualsJsonFileActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->jsonStringNotEqualsJsonFile('');
    }

    /** @test */
    public function jsonStringEqualsJsonStringActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->jsonStringEqualsJsonString('');
    }

    /** @test */
    public function jsonStringNotEqualsJsonStringActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->jsonStringNotEqualsJsonString('');
    }

    /** @test */
    public function matchesRegularExpressionActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->matchesRegularExpression('');
    }

    /** @test */
    public function doesNotMatchRegularExpressionActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->doesNotMatchRegularExpression('');
    }

    /** @test */
    public function objectEqualsActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->objectEquals('');
    }

    /** @test */
    public function objectEqualsExpectedValue(): void
    {
        $this->expectException($this->error());
        ass(new ValueObject(1))->objectEquals('');
    }

    /** @test */
    public function sameSizeActualValue(): void
    {
        $this->expectException($this->error());

        ass('')->sameSize('');
    }

    /** @test */
    public function sameSizeExpectedValue(): void
    {
        $this->expectException($this->error());

        ass([])->sameSize('');
    }

    /** @test */
    public function notSameSizeActualValue(): void
    {
        $this->expectException($this->error());

        ass('')->notSameSize('');
    }

    /** @test */
    public function notSameSizeExpectedValue(): void
    {
        $this->expectException($this->error());

        ass([])->notSameSize('');
    }

    /** @test */
    public function stringContainsStringActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->stringContainsString('');
    }

    /** @test */
    public function stringNotContainsStringActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->stringNotContainsString('');
    }

    /** @test */
    public function stringContainsStringIgnoringCaseActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->stringContainsStringIgnoringCase('');
    }

    /** @test */
    public function stringNotContainsStringIgnoringCaseActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->stringNotContainsStringIgnoringCase('');
    }

    /** @test */
    public function stringContainsStringIgnoringLineEndingsActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->stringContainsStringIgnoringLineEndings('');
    }

    /** @test */
    public function stringEqualsFileCanonicalizingActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->stringEqualsFileCanonicalizing('');
    }

    /** @test */
    public function stringNotEqualsFileCanonicalizingActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->stringNotEqualsFileCanonicalizing('');
    }

    /** @test */
    public function stringEqualsFileIgnoringCaseActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->stringEqualsFileIgnoringCase('');
    }

    /** @test */
    public function stringNotEqualsFileIgnoringCaseActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->stringNotEqualsFileIgnoringCase('');
    }

    /** @test */
    public function stringEqualIgnoringLineEndingsActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->stringEqualIgnoringLineEndings('');
    }

    /** @test */
    public function stringMatchesFormatActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->stringMatchesFormat('');
    }

    /** @test */
    public function stringNotMatchesFormatActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->stringNotMatchesFormat('');
    }

    /** @test */
    public function stringMatchesFormatFileActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->stringMatchesFormatFile('');
    }

    /** @test */
    public function stringNotMatchesFormatFileActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->stringNotMatchesFormatFile('');
    }

    /** @test */
    public function stringStartsWithActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->stringStartsWith('');
    }

    /** @test */
    public function stringStartsNotWithActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->stringStartsNotWith('');
    }

    /** @test */
    public function stringEndsWithActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->stringEndsWith('');
    }

    /** @test */
    public function stringEndsNotWithActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->stringEndsNotWith('');
    }

    /** @test */
    public function xmlFileEqualsXmlFileActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->xmlFileEqualsXmlFile('');
    }

    /** @test */
    public function xmlFileNotEqualsXmlFileActualValue(): void
    {
        $this->expectException($this->error());

        ass(false)->xmlFileNotEqualsXmlFile('');
    }
}
