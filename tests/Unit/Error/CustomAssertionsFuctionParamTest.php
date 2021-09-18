<?php

namespace Realodix\NextProject\Test\Error;

use PHPUnit\Framework\TestCase;

final class CustomAssertionsFuctionParamTest extends TestCase
{
    /** @test */
    public function hasPropertyActualValue(): void
    {
        $this->expectException(\TypeError::class);

        ass('not_object')->hasProperty(true);
    }

    /** @test */
    public function stringEqualsActualValue(): void
    {
        $this->expectException(\TypeError::class);

        ass(true)->stringEquals(true);
    }

    /** @test */
    public function stringNotEqualsActualValue(): void
    {
        $this->expectException(\TypeError::class);

        ass(true)->stringNotEquals(true);
    }

    /** @test */
    public function fileEqualsStringActualValue(): void
    {
        $this->expectException(\TypeError::class);

        ass(true)->fileEqualsString('string');
    }

    /** @test */
    public function fileNotEqualsStringActualValue(): void
    {
        $this->expectException(\TypeError::class);

        ass(true)->fileNotEqualsString('string');
    }

    /** @test */
    public function fileEqualsStringIgnoringCaseActualValue(): void
    {
        $this->expectException(\TypeError::class);

        ass(true)->fileEqualsStringIgnoringCase('string');
    }

    /** @test */
    public function fileNotEqualsStringIgnoringCaseActualValue(): void
    {
        $this->expectException(\TypeError::class);

        ass(true)->fileNotEqualsStringIgnoringCase('string');
    }

    /** @test */
    public function markupContainsSelectorActualValue(): void
    {
        $this->expectException(\TypeError::class);

        ass(true)->markupContainsSelector('string');
    }

    /** @test */
    public function markupNotContainsSelectorActualValue(): void
    {
        $this->expectException(\TypeError::class);

        ass(true)->markupNotContainsSelector('string');
    }

    /** @test */
    public function markupElementContainsActualValue(): void
    {
        $this->expectException(\TypeError::class);

        ass(true)->markupElementContains('string');
    }

    /** @test */
    public function markupElementNotContainsActualValue(): void
    {
        $this->expectException(\TypeError::class);

        ass(true)->markupElementNotContains('string');
    }

    /** @test */
    public function markupElementRegExpActualValue(): void
    {
        $this->expectException(\TypeError::class);

        ass(true)->markupElementRegExp('string');
    }

    /** @test */
    public function markupElementNotRegExpActualValue(): void
    {
        $this->expectException(\TypeError::class);

        ass(true)->markupElementNotRegExp('string');
    }

    /** @test */
    public function markupHasElementWithAttributesActualValue(): void
    {
        $this->expectException(\TypeError::class);

        ass(true)->markupHasElementWithAttributes(['array']);
    }

    /** @test */
    public function markupNotHasElementWithAttributesActualValue(): void
    {
        $this->expectException(\TypeError::class);

        ass(true)->markupNotHasElementWithAttributes(['array']);
    }

    /** @test */
    public function markupSelectorCountActualValue(): void
    {
        $this->expectException(\TypeError::class);

        ass(true)->markupSelectorCount(1, 'string');
    }
}
