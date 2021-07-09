<?php

use Realodix\NextProject\Assert\Assert;

if (! function_exists('ass')) {
    /**
     * @param mixed $actual
     *
     * @return Assert
     */
    function ass($actual): Assert
    {
        return new Assert($actual);
    }
}

if (! function_exists('expect')) {
    /**
     * @param mixed $actual
     *
     * @return Assert
     */
    function expect($actual): Assert
    {
        return new Assert($actual);
    }
}

if (! function_exists('should')) {
    /**
     * @param mixed $actual
     *
     * @return Assert
     */
    function should($actual): Assert
    {
        return new Assert($actual);
    }
}

if (! function_exists('verify')) {
    /**
     * @param mixed $actual
     *
     * @return Assert
     */
    function verify($actual): Assert
    {
        return new Assert($actual);
    }
}
