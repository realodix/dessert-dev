<?php

use Realodix\NextProject\Assertion;

if (! \function_exists('ass')) {
    /**
     * @param mixed $actual
     *
     * @return Assertion
     */
    function ass($actual): Assertion
    {
        return new Assertion($actual);
    }
}

if (! \function_exists('verify')) {
    /**
     * @param mixed $actual
     *
     * @return Assertion
     */
    function verify($actual): Assertion
    {
        return new Assertion($actual);
    }
}

if (! \function_exists('expect')) {
    /**
     * @param mixed $actual
     *
     * @return Assertion
     */
    function expect($actual): Assertion
    {
        return new Assertion($actual);
    }
}

if (! \function_exists('should')) {
    /**
     * @param mixed $actual
     *
     * @return Assertion
     */
    function should($actual): Assertion
    {
        return new Assertion($actual);
    }
}
