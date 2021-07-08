<?php

namespace Realodix\NextProject;

use ArrayAccess;
use Countable;
use Realodix\NextProject\BddStyles\BddArray;
use Realodix\NextProject\BddStyles\BddBaseObject;
use Realodix\NextProject\BddStyles\BddCallable;
use Realodix\NextProject\BddStyles\BddClass;
use Realodix\NextProject\BddStyles\BddDirectory;
use Realodix\NextProject\BddStyles\BddFile;
use Realodix\NextProject\BddStyles\BddJsonFile;
use Realodix\NextProject\BddStyles\BddJsonString;
use Realodix\NextProject\BddStyles\BddString;
use Realodix\NextProject\BddStyles\BddXmlFile;
use Realodix\NextProject\BddStyles\BddXmlString;

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
     * @return BddArray
     */
    public static function Array($array): BddArray
    {
        return new BddArray($array);
    }

    public static function BaseObject(object $object): BddBaseObject
    {
        return new BddBaseObject($object);
    }

    public static function Callable(callable $callable): BddCallable
    {
        return new BddCallable($callable);
    }

    public static function Class(string $className): BddClass
    {
        return new BddClass($className);
    }

    public static function Directory(string $directory): BddDirectory
    {
        return new BddDirectory($directory);
    }

    public static function File(string $filename): BddFile
    {
        return new BddFile($filename);
    }

    public static function JsonFile(string $filename): BddJsonFile
    {
        return new BddJsonFile($filename);
    }

    public static function JsonString(string $json): BddJsonString
    {
        return new BddJsonString($json);
    }

    /**
     * @param mixed $actual
     *
     * @return BddCallable
     */
    public static function Mixed($actual): BddCallable
    {
        return new BddCallable($actual);
    }

    public static function String(string $string): BddString
    {
        return new BddString($string);
    }

    public static function XmlFile(string $filename): BddXmlFile
    {
        return new BddXmlFile($filename);
    }

    public static function XmlString(string $xml): BddXmlString
    {
        return new BddXmlString($xml);
    }
}
