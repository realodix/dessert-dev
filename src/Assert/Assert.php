<?php

namespace Realodix\NextProject\Assert;

class Assert
{
    /** @var mixed */
    protected $actual = null;

    /**
     * @param mixed $actual
     */
    protected function __construct($actual)
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

    /**
     * @param mixed $actual
     *
     * @return AssertAny
     */
    public static function any($actual): AssertAny
    {
        return new AssertAny($actual);
    }
}
