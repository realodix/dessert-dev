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
    public static function Any($actual): AssertAny
    {
        return new AssertAny($actual);
    }

    /**
     * @param array|ArrayAccess|Countable|iterable $array
     *
     * @return AssertArray
     */
    public static function Array($array): AssertArray
    {
        return new AssertArray($array);
    }

    public static function BaseObject($object): AssertBaseObject
    {
        return new AssertBaseObject($object);
    }

    public static function Callable(callable $callable): AssertCallable
    {
        return new AssertCallable($callable);
    }

    public static function Class(string $className): AssertClass
    {
        return new AssertClass($className);
    }

    public static function Directory(string $directory): AssertDirectory
    {
        return new AssertDirectory($directory);
    }

    public static function File(string $filename): AssertFile
    {
        return new AssertFile($filename);
    }

    public static function JsonFile(string $filename): AssertJsonFile
    {
        return new AssertJsonFile($filename);
    }

    public static function JsonString(string $json): AssertJsonString
    {
        return new AssertJsonString($json);
    }

    public static function String(string $string): AssertString
    {
        return new AssertString($string);
    }

    public static function XmlFile(string $filename): AssertXmlFile
    {
        return new AssertXmlFile($filename);
    }

    public static function XmlString(string $xml): AssertXmlString
    {
        return new AssertXmlString($xml);
    }
}
