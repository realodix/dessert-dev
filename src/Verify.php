<?php

namespace Realodix\NextProject;

use ArrayAccess;
use Realodix\NextProject\Verifiers\VerifyArray;
use Realodix\NextProject\Verifiers\VerifyCallable;
use Realodix\NextProject\Verifiers\VerifyClass;
use Realodix\NextProject\Verifiers\VerifyDirectory;
use Realodix\NextProject\Verifiers\VerifyFile;
use Realodix\NextProject\Verifiers\VerifyJsonFile;
use Realodix\NextProject\Verifiers\VerifyJsonString;
use Realodix\NextProject\Verifiers\VerifyAny;
use Realodix\NextProject\Verifiers\VerifyBaseObject;
use Realodix\NextProject\Verifiers\VerifyString;
use Realodix\NextProject\Verifiers\VerifyXmlFile;
use Realodix\NextProject\Verifiers\VerifyXmlString;
use Countable;

abstract class Verify
{
    /** @var mixed */
    protected $actual = null;

    /**
     * Verify constructor
     *
     * @param mixed $actual
     */
    protected function __construct($actual)
    {
        $this->actual = $actual;
    }

    /**
     * @param mixed $actual
     * @return self
     */
    public function __invoke($actual): self
    {
        return $this($actual);
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

    public static function XmlFile(string $filename): VerifyXmlFile
    {
        return new VerifyXmlFile($filename);
    }

    public static function XmlString(string $xml): VerifyXmlString
    {
        return new VerifyXmlString($xml);
    }

    public static function BaseObject(object $object): VerifyBaseObject
    {
        return new VerifyBaseObject($object);
    }

    public static function Class(string $className): VerifyClass
    {
        return new VerifyClass($className);
    }

    public static function Directory(string $directory): VerifyDirectory
    {
        return new VerifyDirectory($directory);
    }

    /**
     * @param array|ArrayAccess|Countable|iterable $array
     * @return VerifyArray
     */
    public static function Array($array): VerifyArray
    {
        return new VerifyArray($array);
    }

    public static function String(string $string): VerifyString
    {
        return new VerifyString($string);
    }

    public static function Callable(callable $callable): VerifyCallable
    {
        return new VerifyCallable($callable);
    }

    /**
     * @param mixed $actual
     * @return VerifyAny
     */
    public static function Any($actual): VerifyAny
    {
        return new VerifyAny($actual);
    }
}
