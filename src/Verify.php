<?php

namespace Realodix\NextProject;

use ArrayAccess;
use Countable;
use Realodix\NextProject\Assert\VerifyAny;
use Realodix\NextProject\Assert\VerifyArray;
use Realodix\NextProject\Assert\VerifyBaseObject;
use Realodix\NextProject\Assert\VerifyCallable;
use Realodix\NextProject\Assert\VerifyClass;
use Realodix\NextProject\Assert\VerifyDirectory;
use Realodix\NextProject\Assert\VerifyFile;
use Realodix\NextProject\Assert\VerifyJsonFile;
use Realodix\NextProject\Assert\VerifyJsonString;
use Realodix\NextProject\Assert\VerifyString;
use Realodix\NextProject\Assert\VerifyXmlFile;
use Realodix\NextProject\Assert\VerifyXmlString;

abstract class Verify
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
     * @return VerifyAny
     */
    public static function Any($actual): VerifyAny
    {
        return new VerifyAny($actual);
    }

    /**
     * @param array|ArrayAccess|Countable|iterable $array
     *
     * @return VerifyArray
     */
    public static function Array($array): VerifyArray
    {
        return new VerifyArray($array);
    }

    public static function BaseObject(object $object): VerifyBaseObject
    {
        return new VerifyBaseObject($object);
    }

    public static function Callable(callable $callable): VerifyCallable
    {
        return new VerifyCallable($callable);
    }

    public static function Class(string $className): VerifyClass
    {
        return new VerifyClass($className);
    }

    public static function Directory(string $directory): VerifyDirectory
    {
        return new VerifyDirectory($directory);
    }

    public static function File(string $filename): VerifyFile
    {
        return new VerifyFile($filename);
    }

    public static function JsonFile(string $filename): VerifyJsonFile
    {
        return new VerifyJsonFile($filename);
    }

    public static function JsonString(string $json): VerifyJsonString
    {
        return new VerifyJsonString($json);
    }

    public static function String(string $string): VerifyString
    {
        return new VerifyString($string);
    }

    public static function XmlFile(string $filename): VerifyXmlFile
    {
        return new VerifyXmlFile($filename);
    }

    public static function XmlString(string $xml): VerifyXmlString
    {
        return new VerifyXmlString($xml);
    }
}
