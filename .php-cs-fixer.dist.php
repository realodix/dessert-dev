<?php

use Realodix\Relax\Config;

$localRules = [
    // Laravel
    'method_chaining_indentation' => false,

    // Realodix
    'binary_operator_spaces' => [
        'operators' => [
            '=>' => 'align_single_space',
        ],
    ],
];

return Config::create('Realodix')
    ->setRules($localRules);
