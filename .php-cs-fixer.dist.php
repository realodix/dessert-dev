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
            '=' => 'single_space']
    ],
    'phpdoc_add_missing_param_annotation' => ['only_untyped' => false],
];

return Config::create(new Realodix($addOrOverrideRules))
    ->setFinder($finder);
