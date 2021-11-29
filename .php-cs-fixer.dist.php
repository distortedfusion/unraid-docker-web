<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->ignoreVCSIgnored(true)
    ->exclude([
        'bootstrap/',
        'public/',
        'resources/',
        'storage/',
    ]);

return \DistortedFusion\PhpCsFixerConfig\Config::create()->setFinder($finder);
