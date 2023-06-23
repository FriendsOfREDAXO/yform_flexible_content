<?php
unset($REX);
$REX['REDAXO'] = true;
$REX['HTDOCS_PATH'] = '../../../../';
$REX['BACKEND_FOLDER'] = 'redaxo';
$REX['LOAD_PAGE'] = false;

dump(realpath(__DIR__ . '../../../../core/'));
dump(realpath(__DIR__ . '../../../../core/packages.php'));
require __DIR__ . '../../../../core/boot.php';
require __DIR__ . '../../../../core/packages.php';
$extensions = [
    '../../../../redaxo/src/addons/rexstan/config/rex-superglobals.neon',
    '../../../../redaxo/src/addons/rexstan/vendor/phpstan/phpstan/conf/bleedingEdge.neon',
    '../../../../redaxo/src/addons/rexstan/vendor/phpstan/phpstan-strict-rules/rules.neon',
    '../../../../redaxo/src/addons/rexstan/vendor/phpstan/phpstan-deprecation-rules/rules.neon',
    '../../../../redaxo/src/addons/rexstan/config/phpstan-phpunit.neon',
    '../../../../redaxo/src/addons/rexstan/config/phpstan-dba.neon',
    '../../../../redaxo/src/addons/rexstan/config/cognitive-complexity.neon',
    '../../../../redaxo/src/addons/rexstan/config/code-complexity.neon',
    '../../../../redaxo/src/addons/rexstan/config/dead-code.neon'
];
$addon = ['../../../../redaxo/src/addons/yform_flexible_content/'];

\rexstan\RexStanUserConfig::save(9, $addon, $extensions, 80115);