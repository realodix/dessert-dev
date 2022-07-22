<?php

use Realodix\Dessert\Assertion;

if (! \function_exists('ass')) {
    /**
     * @param mixed $actual
     */
    function ass($actual): Assertion
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

if (! \function_exists('verify')) {
    /**
     * @param mixed $actual
     */
    function verify($actual): Assertion
    {
        return new Assertion($actual);
    }
}
