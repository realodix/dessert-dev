<?php

use Realodix\CsConfig\{Config, Finder};
use Realodix\CsConfig\Rules\Realodix;

$finder = Finder::base(__DIR__);
$addOrOverrideRules = [
    'single_import_per_statement' => false,
    'group_import' => true,

    // Realodix
    'binary_operator_spaces' => [
        'operators' => [
            '=>' => 'align_single_space',
        ],
    ],
];

return Config::create(new Realodix($addOrOverrideRules))
    ->setFinder($finder);
