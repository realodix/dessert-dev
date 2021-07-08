<?php

use Realodix\NextProject\Expectations\ExpectAny;
use Realodix\NextProject\Assert\VerifyAny;

if (! function_exists('verify')) {
    /**
     * @param mixed $actual
     *
     * @return VerifyAny
     */
    function verify($actual): VerifyAny
    {
        return new VerifyAny($actual);
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
