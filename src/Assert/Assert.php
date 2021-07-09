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

    public static function baseObject(object $object)
    {
        return new AssertBaseObject($object);
    }

    public static function callable(callable $callable): AssertCallable
    {
        return new AssertCallable($callable);
    }

    public static function Class(string $className): AssertClass
    {
        return new AssertClass($className);
    }

    public static function file(string $filename): AssertFile
    {
        return new AssertFile($filename);
    }

    public static function jsonFile(string $filename): AssertJsonFile
    {
        return new AssertJsonFile($filename);
    }

    public static function jsonString(string $json): AssertJsonString
    {
        return new AssertJsonString($json);
    }

    public static function string(string $string): AssertString
    {
        return new AssertString($string);
    }

    public static function xmlFile(string $filename): AssertXmlFile
    {
        return new AssertXmlFile($filename);
    }

    public static function xmlString(string $xml): AssertXmlString
    {
        return new AssertXmlString($xml);
    }
}
