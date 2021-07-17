<?php

namespace Realodix\NextProject\Traits;

use PHPUnit\Framework\Assert as PHPUnit;
use Realodix\NextProject\Support\Markup;
use Realodix\NextProject\Support\Validator as Validator;

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
