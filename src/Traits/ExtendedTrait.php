<?php

namespace Realodix\NextProject\Traits;

use PHPUnit\Framework\Assert as PHPUnit;
use Realodix\NextProject\Helpers\ValidatorHelper as Validator;
// use Realodix\NextProject\Helpers\MarkupHelper as Markup;
use Laminas\Dom\Query;

trait ExtendedTrait
{
    public function contains($needle, string $message = ''): self
    {
        if (is_string($this->actual)) {
            PHPUnit::assertStringContainsString($needle, $this->actual, $message);
        } else {
            PHPUnit::assertContains($needle, $this->actual, $message);
        }

        return $this;
    }

    public function notContains($needle, string $message = ''): self
    {
        if (is_string($this->actual)) {
            PHPUnit::assertStringNotContainsString($needle, $this->actual, $message);
        } else {
            PHPUnit::assertNotContains($needle, $this->actual, $message);
        }

        return $this;
    }

    public function stringEquals(string $expected, string $message = ''): self
    {
        if (Validator::isJson($this->actual)) {
            PHPUnit::assertJsonStringEqualsJsonString($expected, $this->actual, $message);

            return $this;
        }

        if (Validator::isXml($this->actual)) {
            PHPUnit::assertXmlStringEqualsXmlString($expected, $this->actual, $message);

            return $this;
        }

        PHPUnit::assertEquals($expected, $this->actual, $message);

        return $this;
    }

    public function stringEqualsFile(string $expected, string $message = ''): self
    {
        if (Validator::isJson($this->actual)) {
            PHPUnit::assertJsonStringEqualsJsonFile($expected, $this->actual, $message);

            return $this;
        }

        if (Validator::isXml($this->actual)) {
            PHPUnit::assertXmlStringEqualsXmlFile($expected, $this->actual, $message);

            return $this;
        }

        PHPUnit::assertStringEqualsFile($expected, $this->actual, $message);

        return $this;
    }

    public function stringNotEquals(string $expected, string $message = ''): self
    {
        if (Validator::isJson($this->actual)) {
            PHPUnit::assertJsonStringNotEqualsJsonString($expected, $this->actual, $message);

            return $this;
        }

        if (Validator::isXml($this->actual)) {
            PHPUnit::assertXmlStringNotEqualsXmlString($expected, $this->actual, $message);

            return $this;
        }

        PHPUnit::assertNotEquals($expected, $this->actual, $message);

        return $this;
    }

    public function stringNotEqualsFile(string $expected, string $message = ''): self
    {
        if (Validator::isJson($this->actual)) {
            PHPUnit::assertJsonStringNotEqualsJsonFile($expected, $this->actual, $message);

            return $this;
        }

        if (Validator::isXml($this->actual)) {
            PHPUnit::assertXmlStringNotEqualsXmlFile($expected, $this->actual, $message);

            return $this;
        }

        PHPUnit::assertStringNotEqualsFile($expected, $this->actual, $message);

        return $this;
    }


    public function markupContainsSelector($expected, string $message = ''): self
    {
        $results = (new Query($this->actual))->execute($expected);

        PHPUnit::assertGreaterThan(0, count($results), $message);

        return $this;
    }
    public function markupNotContainsSelector($expected, string $message = ''): self
    {
        PHPUnit::assertEquals(
            0,
            count((new Query($this->actual))->execute($expected)),
            $message
        );

        return $this;
    }
    public function markupSelectorCount($expected, string $message = ''): self
    {
         return (new Markup)->assertSelectorCount($expected, $this->actual, $message);
    }
    public function markupHasElementWithAttributes($expected, string $message = ''): self
    {
         return (new Markup)->assertHasElementWithAttributes($expected, $this->actual, $message);
    }
    public function markupNotHasElementWithAttributes($expected, string $message = ''): self
    {
         return (new Markup)->assertNotHasElementWithAttributes($expected, $this->actual, $message);
    }
    public function markupElementContains($expected, string $message = ''): self
    {
         return (new Markup)->assertElementContains($expected, $this->actual, $message);
    }
    public function markupElementNotContains($expected, string $message = ''): self
    {
         return (new Markup)->assertElementNotContains($expected, $this->actual, $message);
    }
    public function markupElementRegExp($expected, string $message = ''): self
    {
         return (new Markup)->assertElementRegExp($expected, $this->actual, $message);
    }
    public function markupElementNotRegExp($expected, string $message = ''): self
    {
         return (new Markup)->assertElementNotRegExp($expected, $this->actual, $message);
    }
}
