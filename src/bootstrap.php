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
