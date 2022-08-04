<?php

namespace Realodix\Dessert\Traits;

use PHPUnit\Framework\Constraint\{IsEqual, IsEqualIgnoringCase, LogicalNot};
use PHPUnit\Framework\{Assert, ExpectationFailedException};
use Realodix\Dessert\Support\{Arr, Dom, NullClosure, Validator};

trait CustomTrait
{
    /**
     * Asserts that the value contains the property $name.
     *
     * @param mixed $value
     */
    public function hasProperty(string $name, mixed $value = null): self
    {
        $actual = Validator::actualValue($this->actual, 'object');

        Assert::assertTrue(property_exists($actual, $name));

        if (\func_num_args() > 1) {
            Assert::assertEquals($value, $actual->{$name});
        }

        return $this;
    }

    /**
     * Asserts that the value contains the provided properties $names.
     */
    public function hasProperties(iterable $names): self
    {
        foreach ($names as $name) {
            $this->hasProperty($name);
        }

        return $this;
    }

    public function stringEquals(string $expected, string $message = ''): self
    {
        $actual = $this->actual(Validator::actualValue($this->actual, 'string'));

        if (Validator::isJson($this->actual)) {
            $actual->jsonStringEqualsJsonString($expected, $message);

            return $this;
        }

        if (Validator::isXml($this->actual)) {
            $actual->xmlStringEqualsXmlString($expected, $message);

            return $this;
        }

        $actual->equals($expected, $message);

        return $this;
    }

    public function stringNotEquals(string $expected, string $message = ''): self
    {
        $actual = $this->actual(Validator::actualValue($this->actual, 'string'));

        if (Validator::isJson($this->actual)) {
            $actual->jsonStringNotEqualsJsonString($expected, $message);

            return $this;
        }

        if (Validator::isXml($this->actual)) {
            $actual->xmlStringNotEqualsXmlString($expected, $message);

            return $this;
        }

        $actual->notEquals($expected, $message);

        return $this;
    }

    /**
     * Asserts that the contents of one file is equal to the string.
     *
     * Reference:
     * - https://github.com/sebastianbergmann/phpunit/pull/4649
     */
    public function fileEqualsString(string $expectedString, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');
        $constraint = new IsEqual($expectedString);

        Assert::assertFileExists($actual, $message);
        Assert::assertThat(file_get_contents($actual), $constraint, $message);

        return $this;
    }

    public function fileNotEqualsString(string $expectedString, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');
        $constraint = new LogicalNot(new IsEqual($expectedString));

        Assert::assertFileExists($actual, $message);
        Assert::assertThat(file_get_contents($actual), $constraint, $message);

        return $this;
    }

    /**
     * Asserts that the contents of one file is equal to the string (ignoring case).
     */
    public function fileEqualsStringIgnoringCase(string $expectedString, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');
        Assert::assertFileExists($actual, $message);

        $constraint = new IsEqualIgnoringCase($expectedString);
        Assert::assertThat(file_get_contents($actual), $constraint, $message);

        return $this;
    }

    public function fileNotEqualsStringIgnoringCase(string $expectedString, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');
        Assert::assertFileExists($actual, $message);

        $constraint = new LogicalNot(new IsEqualIgnoringCase($expectedString));
        Assert::assertThat(file_get_contents($actual), $constraint, $message);

        return $this;
    }

    /**
     * Asserts that $number matches value's Length.
     */
    public function hasLength(int $number): self
    {
        if (\is_string($this->actual)) {
            Assert::assertEquals($number, mb_strlen($this->actual));

            return $this;
        }

        if (is_iterable($this->actual)) {
            $this->count($number);

            return $this;
        }

        if (\is_object($this->actual)) {
            if (method_exists($this->actual, 'toArray')) {
                $array = $this->actual->toArray();
            } else {
                $array = (array) $this->actual;
            }

            Assert::assertCount($number, $array);

            return $this;
        }

        throw new \BadMethodCallException('Expectation value length is not countable.');
    }

    /**
     * Asserts that $number not matches value's Length.
     */
    public function notHasLength(int $number): self
    {
        if (\is_string($this->actual)) {
            Assert::assertNotEquals($number, mb_strlen($this->actual));

            return $this;
        }

        if (is_iterable($this->actual)) {
            $this->notCount($number);

            return $this;
        }

        if (\is_object($this->actual)) {
            if (method_exists($this->actual, 'toArray')) {
                $array = $this->actual->toArray();
            } else {
                $array = (array) $this->actual;
            }

            Assert::assertNotCount($number, $array);

            return $this;
        }

        throw new \BadMethodCallException('Expectation value length is not countable.');
    }

    /**
     * Assert that the given string contains an element matching the given selector.
     *
     * @param string $selector A query $selector for the element to find.
     * @param string $message  A message to display if the assertion fails.
     */
    public function markupContainsSelector(string $selector, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');
        $results = Dom::executeQuery($actual, $selector)->count();

        $this->actual($results)->greaterThan(0, $message);

        return $this;
    }

    /**
     * Assert that the given string does not contain an element matching the given selector.
     *
     * @param string $selector A query $selector for the element to find.
     * @param string $message  A message to display if the assertion fails.
     */
    public function markupNotContainsSelector(string $selector, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');
        $results = Dom::executeQuery($actual, $selector)->count();

        $this->actual($results)->equals(0, $message);

        return $this;
    }

    /**
     * Assert an element's contents contain the given string.
     *
     * @param string $contents The string to look for within the DOM node's contents.
     * @param string $selector A query selector for the element to find.
     * @param string $message  A message to display if the assertion fails.
     */
    public function markupElementContains(string $contents, string $selector = '', string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');
        $matchedElements = Dom::getInnerHtmlOfMatchedElements($actual, $selector);

        $this->actual($matchedElements)->stringContainsString($contents, $message);

        return $this;
    }

    /**
     * Assert an element's contents do not contain the given string.
     *
     * @param string $contents The string to look for within the DOM node's contents.
     * @param string $selector A query $selector for the element to find.
     * @param string $message  A message to display if the assertion fails.
     */
    public function markupElementNotContains(string $contents, string $selector = '', string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');
        $matchedElements = Dom::getInnerHtmlOfMatchedElements($actual, $selector);

        $this->actual($matchedElements)->stringNotContainsString($contents, $message);

        return $this;
    }

    /**
     * Assert an element's contents contain the given regular expression pattern.
     *
     * @param string $regexp   The regular expression pattern to look for within the DOM node.
     * @param string $selector A query $selector for the element to find.
     * @param string $message  A message to display if the assertion fails.
     */
    public function markupElementRegExp(string $regexp, string $selector = '', string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');
        $matchedElements = Dom::getInnerHtmlOfMatchedElements($actual, $selector);

        $this->actual($matchedElements)->matchesRegularExpression($regexp, $message);

        return $this;
    }

    /**
     * Assert an element's contents do not contain the given regular expression pattern.
     *
     * @param string $regexp   The regular expression pattern to look for within the DOM node.
     * @param string $selector A query $selector for the element to find.
     * @param string $message  A message to display if the assertion fails.
     */
    public function markupElementNotRegExp(string $regexp, string $selector = '', string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');
        $matchedElements = Dom::getInnerHtmlOfMatchedElements($actual, $selector);

        $this->actual($matchedElements)->doesNotMatchRegularExpression($regexp, $message);

        return $this;
    }

    /**
     * Assert that an element with the given attributes exists in the given markup.
     *
     * @param array  $attributes An array of HTML attributes that should be found on the element.
     * @param string $message    A message to display if the assertion fails.
     */
    public function markupHasElementWithAttributes(array $attributes = [], string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');
        $attributes = '*'.Dom::flattenAttributeArray($attributes);

        $this->actual($actual)->markupContainsSelector($attributes, $message);

        return $this;
    }

    /**
     * Assert that an element with the given attributes does not exist in the given markup.
     *
     * @param array  $attributes An array of HTML attributes that should be found on the element.
     * @param string $message    A message to display if the assertion fails.
     */
    public function markupNotHasElementWithAttributes(array $attributes = [], string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');
        $attributes = '*'.Dom::flattenAttributeArray($attributes);

        $this->actual($actual)->markupNotContainsSelector($attributes, $message);

        return $this;
    }

    /**
     * Assert the number of times an element matching the given selector is found.
     *
     * @param int    $count    The number of matching elements expected.
     * @param string $selector A query selector for the element to find.
     * @param string $message  A message to display if the assertion fails.
     */
    public function markupSelectorCount(int $count, string $selector, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');
        $results = Dom::executeQuery($actual, $selector);

        $this->actual($results)->count($count, $message);

        return $this;
    }

    /**
     * Asserts that executing value throws an exception.
     *
     * @param string|\Closure $exception string: the exception class
     *                                   Closure: first parameter = exception class
     */
    public function throw(string|\Closure $exception, string $exceptionMessage = null): self
    {
        $callback = NullClosure::create();

        if ($exception instanceof \Closure) {
            $callback = $exception;
            $parameters = (new \ReflectionFunction($exception))->getParameters();

            if (1 !== \count($parameters)) {
                throw new \LogicException('The "throw" closure must have a single parameter type-hinted as the class string');
            }

            if (! ($type = $parameters[0]->getType()) instanceof \ReflectionNamedType) {
                throw new \LogicException('The "throw" closure\'s parameter must be type-hinted as the class string');
            }

            $exception = $type->getName();
        }

        try {
            ($this->actual)();
        } catch (\Throwable $e) {
            if (! class_exists($exception)) {
                Assert::assertStringContainsString($exception, $e->getMessage());

                return $this;
            }

            if ($exceptionMessage) {
                Assert::assertStringContainsString($exceptionMessage, $e->getMessage());
            }

            Assert::assertInstanceOf($exception, $e);
            $callback($e);

            return $this;
        }

        if (! class_exists($exception)) {
            throw new ExpectationFailedException("Exception with message \"{$exception}\" not thrown.");
        }

        throw new ExpectationFailedException("Exception \"{$exception}\" not thrown.");
    }
}
