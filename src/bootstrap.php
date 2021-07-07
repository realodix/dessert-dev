<?php

use Realodix\NextProject\Assert;

if (! function_exists('ass')) {
    /**
     * @param mixed $actual
     */
    function ass($actual)
    {
        return new Assert($actual);
    }
}
