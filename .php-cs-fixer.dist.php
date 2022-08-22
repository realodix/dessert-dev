<?php

use Realodix\Relax\Config;

$localRules = [
    // Realodix
    'binary_operator_spaces' => [
        'operators' => [
            '=>' => 'align_single_space',
        ],
    ],
    'phpdoc_add_missing_param_annotation' => true,
];

return Config::create('@Realodix', $localRules);
