<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/src')
    ->in(__DIR__ . '/tests')
    ->name('*.php');

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR12' => true,
        '@PHP82Migration' => true,

        // Ensure promoted properties are formatted with one property per line
        'multiline_promoted_properties' => [
            'keep_blank_lines' => true,
        ],

        // Adjust method argument spacing and attribute placement
        'method_argument_space' => [
            'on_multiline' => 'ignore',
            'attribute_placement' => 'ignore',
            'keep_multiple_spaces_after_comma' => false,
        ],

        // Other useful rules
        'trailing_comma_in_multiline' => [
            'elements' => ['arrays', 'arguments', 'parameters'],
        ],
    ])
    ->setFinder($finder);