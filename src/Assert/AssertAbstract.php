<?php

namespace Realodix\NextProject\Assert;

abstract class AssertAbstract
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
     * @return Assert
     */
    public static function any($actual): Assert
    {
        return new Assert($actual);
    }
}
