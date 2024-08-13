<?php

namespace Realodix\Dessert\Test\Error;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Realodix\Dessert\Exceptions\InvalidActualValue;
use Realodix\Dessert\Test\Fixtures\ObjectEquals\ValueObject;

final class PHPUnitFuctionParamTest extends TestCase
{
    private function error()
    {
        return InvalidActualValue::class;
    }

    #[Test]
    public function arrayHasKeyActualValue(): void
    {
        $this->expectException($this->error());

        verify('$errors')->hasKey(true);
    }

    #[Test]
    public function arrayNotHasKeyActualValue(): void
    {
        $this->expectException($this->error());

        verify('$errors')->notHasKey(true);
    }

    #[Test]
    public function containsOnlyActualValue(): void
    {
        $this->expectException($this->error());

        verify('not_iterable')->containsOnly('');
    }

    #[Test]
    public function notContainsOnlyActualValue(): void
    {
        $this->expectException($this->error());

        verify('not_iterable')->notContainsOnly('');
    }

    #[Test]
    public function containsOnlyInstancesOfActualValue(): void
    {
        $this->expectException($this->error());

        verify('not_iterable')->containsOnlyInstancesOf('');
    }

    #[Test]
    public function countActualValue(): void
    {
        $this->expectException($this->error());

        verify('not_countable_or_iterable')->count(1);
    }

    #[Test]
    public function notCountActualValue(): void
    {
        $this->expectException($this->error());

        verify('not_countable_or_iterable')->notCount(1);
    }

    #[Test]
    public function directoryExistsActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->directoryExists();
    }

    #[Test]
    public function directoryDoesNotExistActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->directoryDoesNotExist();
    }

    #[Test]
    public function directoryIsReadableActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->directoryIsReadable();
    }

    #[Test]
    public function directoryIsNotReadableActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->directoryIsNotReadable();
    }

    #[Test]
    public function directoryIsWritableActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->directoryIsWritable();
    }

    #[Test]
    public function directoryIsNotWritableActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->directoryIsNotWritable();
    }

    #[Test]
    public function fileEqualsActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->fileEquals('');
    }

    #[Test]
    public function fileNotEqualsActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->fileNotEquals('');
    }

    #[Test]
    public function fileEqualsCanonicalizingActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->fileEqualsCanonicalizing('');
    }

    #[Test]
    public function fileNotEqualsCanonicalizingActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->fileNotEqualsCanonicalizing('');
    }

    #[Test]
    public function fileEqualsIgnoringCaseActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->fileEqualsIgnoringCase('');
    }

    #[Test]
    public function fileNotEqualsIgnoringCaseActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->fileNotEqualsIgnoringCase('');
    }

    #[Test]
    public function fileExistsActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->fileExists();
    }

    #[Test]
    public function fileDoesNotExistActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->fileDoesNotExist();
    }

    #[Test]
    public function fileIsReadableActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->fileIsReadable();
    }

    #[Test]
    public function fileIsNotReadableActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->fileIsNotReadable();
    }

    #[Test]
    public function fileIsWritableActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->fileIsWritable();
    }

    #[Test]
    public function fileIsNotWritableActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->fileIsNotWritable();
    }

    #[Test]
    public function instanceOfExpectedValue(): void
    {
        $this->expectException($this->error());

        verify('')->instanceOf(fooBar::class);
    }

    #[Test]
    public function notInstanceOfExpectedValue(): void
    {
        $this->expectException($this->error());

        verify('')->notInstanceOf(fooBar::class);
    }

    #[Test]
    public function isReadableActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->isReadable();
    }

    #[Test]
    public function isNotReadableActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->isNotReadable();
    }

    #[Test]
    public function isWritableActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->isWritable();
    }

    #[Test]
    public function isNotWritableActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->isNotWritable();
    }

    #[Test]
    public function jsonActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->json('');
    }

    #[Test]
    public function jsonFileEqualsJsonFileActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->jsonFileEqualsJsonFile('');
    }

    #[Test]
    public function jsonFileNotEqualsJsonFileActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->jsonFileNotEqualsJsonFile('');
    }

    #[Test]
    public function jsonStringEqualsJsonFileActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->jsonStringEqualsJsonFile('');
    }

    #[Test]
    public function jsonStringNotEqualsJsonFileActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->jsonStringNotEqualsJsonFile('');
    }

    #[Test]
    public function jsonStringEqualsJsonStringActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->jsonStringEqualsJsonString('');
    }

    #[Test]
    public function jsonStringNotEqualsJsonStringActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->jsonStringNotEqualsJsonString('');
    }

    #[Test]
    public function matchesRegularExpressionActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->matchesRegularExpression('');
    }

    #[Test]
    public function doesNotMatchRegularExpressionActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->doesNotMatchRegularExpression('');
    }

    #[Test]
    public function objectEqualsActualValue(): void
    {
        $this->expectException($this->error());

        verify('notObject')->objectEquals(new ValueObject(1));
    }

    #[Test]
    public function sameSizeActualValue(): void
    {
        $this->expectException($this->error());

        verify('')->sameSize([1]);
    }

    #[Test]
    public function notSameSizeActualValue(): void
    {
        $this->expectException($this->error());

        verify('')->notSameSize([1]);
    }

    #[Test]
    public function stringContainsStringActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringContainsString('');
    }

    #[Test]
    public function stringNotContainsStringActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringNotContainsString('');
    }

    #[Test]
    public function stringContainsStringIgnoringCaseActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringContainsStringIgnoringCase('');
    }

    #[Test]
    public function stringNotContainsStringIgnoringCaseActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringNotContainsStringIgnoringCase('');
    }

    #[Test]
    public function stringContainsStringIgnoringLineEndingsActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringContainsStringIgnoringLineEndings('');
    }

    #[Test]
    public function stringEqualsFileCanonicalizingActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringEqualsFileCanonicalizing('');
    }

    #[Test]
    public function stringNotEqualsFileCanonicalizingActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringNotEqualsFileCanonicalizing('');
    }

    #[Test]
    public function stringEqualsFileIgnoringCaseActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringEqualsFileIgnoringCase('');
    }

    #[Test]
    public function stringNotEqualsFileIgnoringCaseActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringNotEqualsFileIgnoringCase('');
    }

    #[Test]
    public function stringEqualIgnoringLineEndingsActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringEqualIgnoringLineEndings('');
    }

    #[Test]
    public function stringMatchesFormatActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringMatchesFormat('');
    }

    #[Test]
    public function stringMatchesFormatFileActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringMatchesFormatFile('');
    }

    #[Test]
    public function stringStartsWithActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringStartsWith('');
    }

    #[Test]
    public function stringStartsNotWithActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringStartsNotWith('');
    }

    #[Test]
    public function stringEndsWithActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringEndsWith('');
    }

    #[Test]
    public function stringEndsNotWithActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->stringEndsNotWith('');
    }

    #[Test]
    public function xmlFileEqualsXmlFileActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->xmlFileEqualsXmlFile('');
    }

    #[Test]
    public function xmlFileNotEqualsXmlFileActualValue(): void
    {
        $this->expectException($this->error());

        verify(false)->xmlFileNotEqualsXmlFile('');
    }
}
