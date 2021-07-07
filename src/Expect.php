<?php

namespace Realodix\NextProject;

use ArrayAccess;
use Countable;
use Realodix\NextProject\Expectations\ExpectArray;
use Realodix\NextProject\Expectations\ExpectBaseObject;
use Realodix\NextProject\Expectations\ExpectCallable;
use Realodix\NextProject\Expectations\ExpectClass;
use Realodix\NextProject\Expectations\ExpectDirectory;
use Realodix\NextProject\Expectations\ExpectFile;
use Realodix\NextProject\Expectations\ExpectJsonFile;
use Realodix\NextProject\Expectations\ExpectJsonString;
use Realodix\NextProject\Expectations\ExpectString;
use Realodix\NextProject\Expectations\ExpectXmlFile;
use Realodix\NextProject\Expectations\ExpectXmlString;

abstract class Expect
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
     * @param array|ArrayAccess|Countable|iterable $array
     *
     * @return ExpectArray
     */
    public static function Array($array): ExpectArray
    {
        return new ExpectArray($array);
    }

    public static function BaseObject(object $object): ExpectBaseObject
    {
        return new ExpectBaseObject($object);
    }

    public static function Callable(callable $callable): ExpectCallable
    {
        return new ExpectCallable($callable);
    }

    public static function Class(string $className): ExpectClass
    {
        return new ExpectClass($className);
    }

    public static function Directory(string $directory): ExpectDirectory
    {
        return new ExpectDirectory($directory);
    }

    public static function File(string $filename): ExpectFile
    {
        return new ExpectFile($filename);
    }

    public static function JsonFile(string $filename): ExpectJsonFile
    {
        return new ExpectJsonFile($filename);
    }

    public static function JsonString(string $json): ExpectJsonString
    {
        return new ExpectJsonString($json);
    }

    /**
     * @param mixed $actual
     *
     * @return ExpectCallable
     */
    public static function Mixed($actual): ExpectCallable
    {
        return new ExpectCallable($actual);
    }

    public static function String(string $string): ExpectString
    {
        return new ExpectString($string);
    }

    public static function XmlFile(string $filename): ExpectXmlFile
    {
        return new ExpectXmlFile($filename);
    }

    public static function XmlString(string $xml): ExpectXmlString
    {
        return new ExpectXmlString($xml);
    }
}
