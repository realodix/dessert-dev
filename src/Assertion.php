<?php

namespace Realodix\NextProject;

use PHPUnit\Framework\Assert as PHPUnit;

class Assertion
{
    use Traits\ClassTrait;
    use Traits\ComparisonTrait;
    use Traits\FileDirectoryTrait;
    use Traits\IsTypeTrait;
    use Traits\StringTrait;
    use Traits\ShortcutTrait;

    /** @var mixed */
    protected $actual = null;

    /**
     * @param mixed $actual
     */
    public function __construct($actual)
    {
        $this->actual = $actual;
    }

    /**
     * @param mixed $actual
     *
     * @return self
     */
    public function __invoke($actual): self
    {
        return $this($actual);
    }

    public function arrayHasKey($key, string $message = ''): self
    {
        PHPUnit::assertArrayHasKey($key, $this->actual, $message);

        return $this;
    }

    public function arrayNotHasKey($key, string $message = ''): self
    {
        PHPUnit::assertArrayNotHasKey($key, $this->actual, $message);

        return $this;
    }

    public function contains($needle, string $message = ''): self
    {
        PHPUnit::assertContains($needle, $this->actual, $message);

        return $this;
    }

    public function containsOnly($type, $isNativeType = null, string $message = ''): self
    {
        PHPUnit::assertContainsOnly($type, $this->actual, $isNativeType, $message);

        return $this;
    }

    public function containsOnlyInstancesOf($className, string $message = ''): self
    {
        PHPUnit::assertContainsOnlyInstancesOf($className, $this->actual, $message);

        return $this;
    }

    public function count($expectedCount, string $message = ''): self
    {
        PHPUnit::assertCount($expectedCount, $this->actual, $message);

        return $this;
    }

    public function empty(string $message = ''): self
    {
        PHPUnit::assertEmpty($this->actual, $message);

        return $this;
    }

    public function false(string $message = ''): self
    {
        PHPUnit::assertFalse($this->actual, $message);

        return $this;
    }

    public function finite(string $message = ''): self
    {
        PHPUnit::assertFinite($this->actual, $message);

        return $this;
    }

    public function infinite(string $message = ''): self
    {
        PHPUnit::assertInfinite($this->actual, $message);

        return $this;
    }

    public function json(string $message = ''): self
    {
        PHPUnit::assertJson($this->actual, $message);

        return $this;
    }

    public function nan(string $message = ''): self
    {
        PHPUnit::assertNan($this->actual, $message);

        return $this;
    }

    public function notContains($needle, string $message = ''): self
    {
        PHPUnit::assertNotContains($needle, $this->actual, $message);

        return $this;
    }

    public function notContainsOnly($type, $isNativeType = null, string $message = ''): self
    {
        PHPUnit::assertNotContainsOnly($type, $this->actual, $isNativeType, $message);

        return $this;
    }

    public function notCount($expectedCount, string $message = ''): self
    {
        PHPUnit::assertNotCount($expectedCount, $this->actual, $message);

        return $this;
    }

    public function notEmpty(string $message = ''): self
    {
        PHPUnit::assertNotEmpty($this->actual, $message);

        return $this;
    }

    public function notFalse(string $message = ''): self
    {
        PHPUnit::assertNotFalse($this->actual, $message);

        return $this;
    }

    public function notNull(string $message = ''): self
    {
        PHPUnit::assertNotNull($this->actual, $message);

        return $this;
    }

    public function notTrue(string $message = ''): self
    {
        PHPUnit::assertNotTrue($this->actual, $message);

        return $this;
    }

    public function null(string $message = ''): self
    {
        PHPUnit::assertNull($this->actual, $message);

        return $this;
    }

    public function true(string $message = ''): self
    {
        PHPUnit::assertTrue($this->actual, $message);

        return $this;
    }
}
