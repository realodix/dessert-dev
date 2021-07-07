<?php

namespace Realodix\NextProject;

use Realodix\NextProject\Expectations\ExpectAny;
use Realodix\NextProject\Verifiers\VerifyAny;

if (!function_exists('verify'))
{
    /**
     * @param mixed $actual
     * @return VerifyAny
     */
    function verify($actual): VerifyAny
    {
        return new VerifyAny($actual);
    }
}

if (!function_exists('verify_that'))
{
    /**
     * @param mixed $actual
     * @return VerifyAny
     */
    function verify_that($actual): VerifyAny
    {
        return new VerifyAny($actual);
    }
}

if (!function_exists('expect'))
{
    /**
     * @param mixed $actual
     * @return ExpectAny
     */
    function expect($actual): ExpectAny {
        return new ExpectAny($actual);
    }
}
