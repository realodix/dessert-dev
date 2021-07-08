<?php

use Realodix\NextProject\Assert\AssertAny;
use Realodix\NextProject\BddStyles\BddAny;

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
     * @return BddAny
     */
    function expect($actual): BddAny
    {
        return new BddAny($actual);
    }
}
