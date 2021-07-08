<?php

use Realodix\NextProject\Assert\AssertAny;
use Realodix\NextProject\Expectations\ExpectAny;

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

if (! function_exists('expect')) {
    /**
     * @param mixed $actual
     *
     * @return ExpectAny
     */
    function expect($actual): ExpectAny
    {
        return new ExpectAny($actual);
    }
}
