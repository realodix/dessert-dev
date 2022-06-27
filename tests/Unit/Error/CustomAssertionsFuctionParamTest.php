<?php

namespace Realodix\NextProject\Test\Error;

use PHPUnit\Framework\TestCase;

final class CustomAssertionsFuctionParamTest extends TestCase
{
    private function error()
    {
        return \InvalidArgumentException::class;
    }

    /** @test */
    public function hasPropertyActualValue(): void
    {
        $this->expectException($this->error());

        ass('not_object')->hasProperty(true);
    }

    /** @test */
    public function stringEqualsActualValue(): void
    {
        $this->expectException($this->error());

        ass(true)->stringEquals(true);
    }

    /** @test */
    public function stringNotEqualsActualValue(): void
    {
        $this->expectException($this->error());

        ass(true)->stringNotEquals(true);
    }

    /** @test */
    public function fileEqualsStringActualValue(): void
    {
        $this->expectException($this->error());

        ass(true)->fileEqualsString('string');
    }

    /** @test */
    public function fileNotEqualsStringActualValue(): void
    {
        $this->expectException($this->error());

        ass(true)->fileNotEqualsString('string');
    }

    /** @test */
    public function fileEqualsStringIgnoringCaseActualValue(): void
    {
        $this->expectException($this->error());

        ass(true)->fileEqualsStringIgnoringCase('string');
    }

    /** @test */
    public function fileNotEqualsStringIgnoringCaseActualValue(): void
    {
        $this->expectException($this->error());

        ass(true)->fileNotEqualsStringIgnoringCase('string');
    }

    /** @test */
    public function markupContainsSelectorActualValue(): void
    {
        $this->expectException($this->error());

        ass(true)->markupContainsSelector('string');
    }

    /** @test */
    public function markupNotContainsSelectorActualValue(): void
    {
        $this->expectException($this->error());

        ass(true)->markupNotContainsSelector('string');
    }

    /** @test */
    public function markupElementContainsActualValue(): void
    {
        $this->expectException($this->error());

        ass(true)->markupElementContains('string');
    }

    /** @test */
    public function markupElementNotContainsActualValue(): void
    {
        $this->expectException($this->error());

        ass(true)->markupElementNotContains('string');
    }

    /** @test */
    public function markupElementRegExpActualValue(): void
    {
        $this->expectException($this->error());

        ass(true)->markupElementRegExp('string');
    }

    /** @test */
    public function markupElementNotRegExpActualValue(): void
    {
        $this->expectException($this->error());

        ass(true)->markupElementNotRegExp('string');
    }

    /** @test */
    public function markupHasElementWithAttributesActualValue(): void
    {
        $this->expectException($this->error());

        ass(true)->markupHasElementWithAttributes(['array']);
    }

    /** @test */
    public function markupNotHasElementWithAttributesActualValue(): void
    {
        $this->expectException($this->error());

        ass(true)->markupNotHasElementWithAttributes(['array']);
    }

    /** @test */
    public function markupSelectorCountActualValue(): void
    {
        $this->expectException($this->error());

        ass(true)->markupSelectorCount(1, 'string');
    }
}
