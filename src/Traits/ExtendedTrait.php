<?php

namespace Realodix\NextProject\Traits;

use PHPUnit\Framework\Assert as PHPUnit;
use Realodix\NextProject\Support\Markup;
use Realodix\NextProject\Support\Modified;
use Realodix\NextProject\Support\Validator;

trait ExtendedTrait
{
    public function contains($needle, $message = ''): self
    {
        Modified::assertContains($needle, $this->actual, $message);

        return $this;
    }

    public function notContains($needle, $message = ''): self
    {
        Modified::assertNotContains($needle, $this->actual, $message);

        return $this;
    }

    public function stringEqualsFile($expectedFile, $message = ''): self
    {
        Modified::assertStringEqualsFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function stringNotEqualsFile($expectedFile, $message = ''): self
    {
        Modified::assertStringNotEqualsFile($expectedFile, $this->actual, $message);

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

    public function markupContainsSelector(string $selector, string $message = ''): self
    {
        Markup::assertContainsSelector($selector, $this->actual, $message);

        return $this;
    }

    public function markupNotContainsSelector(string $selector, string $message = ''): self
    {
        Markup::assertNotContainsSelector($selector, $this->actual, $message);

        return $this;
    }

    public function markupElementContains(string $contents, string $selector = '', string $message = ''): self
    {
        Markup::assertElementContains($contents, $selector, $this->actual, $message);

        return $this;
    }

    public function markupElementNotContains(string $contents, string $selector = '', string $message = ''): self
    {
        Markup::assertElementNotContains($contents, $selector, $this->actual, $message);

        return $this;
    }

    public function markupElementRegExp(string $regexp, string $selector = '', string $message = ''): self
    {
        Markup::assertElementRegExp($regexp, $selector, $this->actual, $message);

        return $this;
    }

    public function markupElementNotRegExp(string $regexp, string $selector = '', string $message = ''): self
    {
        Markup::assertElementNotRegExp($regexp, $selector, $this->actual, $message);

        return $this;
    }

    public function markupHasElementWithAttributes(array $attributes = [], string $message = ''): self
    {
        Markup::assertHasElementWithAttributes($attributes, $this->actual, $message);

        return $this;
    }

    public function markupNotHasElementWithAttributes(array $attributes = [], string $message = ''): self
    {
        Markup::assertNotHasElementWithAttributes($attributes, $this->actual, $message);

        return $this;
    }

    public function markupSelectorCount(int $count, string $selector, string $message = ''): self
    {
        Markup::assertSelectorCount($count, $selector, $this->actual, $message);

        return $this;
    }
}
