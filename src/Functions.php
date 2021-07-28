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

if (! method_exists('\PHPUnit\Framework\TestCase', 'expectErrorMessage')) {
    // PHPUnit < 8.4.0.
    require_once __DIR__.'/Support/ExpectException.php';

    return;
}

// PHPUnit >= 8.4.0.
require_once __DIR__.'/Support/ExpectException_Empty.php';
