<?php

use Realodix\CsConfig\Factory;
use Realodix\CsConfig\RuleSet;

$overrideRules = [
    'PhpCsFixerCustomFixers/phpdoc_no_superfluous_param' => false,
    'native_function_invocation' => true,
    'braces' => ['allow_single_line_closure' => true],
    'php_unit_method_casing' => false,
    // 'ordered_class_elements' => ['sort_algorithm' => 'alpha'],
];

return Factory::fromRuleSet(new RuleSet\RealodixPlus, $overrideRules);
