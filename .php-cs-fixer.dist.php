<?php

use Realodix\CsConfig\Config;
use Realodix\CsConfig\Finder;
use Realodix\CsConfig\Rules\Realodix;

$finder = Finder::base(__DIR__);
$addOrOverrideRules = [
    // Realodix
    'binary_operator_spaces' => [
        'operators' => [
            '=>' => 'align_single_space',
            '=' => 'single_space']
    ],
];

return Config::create(new Realodix($addOrOverrideRules))
    ->setFinder($finder);
