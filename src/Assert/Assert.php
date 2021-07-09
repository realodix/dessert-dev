<?php

namespace Realodix\NextProject\Assert;

use ArrayAccess;
use Countable;

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

    /**
     * @param array|ArrayAccess|Countable|iterable $array
     *
     * @return AssertArray
     */
    public static function array($array): AssertArray
    {
        return new AssertArray($array);
    }

    public static function Class(string $className): AssertClass
    {
        return new AssertClass($className);
    }

    public static function xmlString(string $xml): AssertXmlString
    {
        return new AssertXmlString($xml);
    }
}
