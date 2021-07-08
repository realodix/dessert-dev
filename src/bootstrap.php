<?php

use Realodix\NextProject\Assert\AssertAny;

if (! function_exists('ass')) {
    /**
     * @param mixed $actual
     *
     * @return AssertAny
     */
    function ass($actual): AssertAny
    {
        return new AssertAny($actual);
    }
}

if (! function_exists('expect')) {
    /**
     * @param mixed $actual
     *
     * @return AssertAny
     */
    function expect($actual): AssertAny
    {
        return new AssertAny($actual);
    }
}

if (! function_exists('should')) {
    /**
     * @param mixed $actual
     *
     * @return AssertAny
     */
    function should($actual): AssertAny
    {
        return new AssertAny($actual);
    }
}

if (! function_exists('verify')) {
    /**
     * @param mixed $actual
     *
     * @return AssertAny
     */
    function verify($actual): AssertAny
    {
        return new AssertAny($actual);
    }
}
