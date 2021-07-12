<?php

namespace Realodix\NextProject;

use PHPUnit\Framework\Assert as PHPUnit;

class Assert
{
    use Traits\ArrayTrait;
    use Traits\ClassTrait;
    use Traits\DataTypeTrait;
    use Traits\FileDirectoryTrait;
    use Traits\StringTrait;
    use Traits\ThrowsTrait;
    use Traits\ComparisonTrait;
    use Traits\XmlTrait;
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
