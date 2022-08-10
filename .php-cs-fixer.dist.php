<?php

use Realodix\CsConfig\Config;
use Realodix\CsConfig\Rules\Realodix;

$localRules = [
    // Realodix
    'binary_operator_spaces' => [
        'operators' => [
            '=>' => 'align_single_space',
        ],
    ],
];

return Config::create(new Realodix($localRules));
