<?php

use Realodix\Relax\Config;

$localRules = [
    // Laravel
    'method_chaining_indentation' => false,
];

return Config::create('relax')
    ->setRules($localRules);
