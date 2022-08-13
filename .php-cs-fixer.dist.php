<?php

use Realodix\Relax\Config;

$localRules = [
    // Realodix
    'binary_operator_spaces' => [
        'operators' => [
            '=>' => 'align_single_space',
        ],
    ],
];

return Config::create('@Realodix', $localRules);
