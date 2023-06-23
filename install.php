<?php

/** @var \rex_addon $this */

$extensions = [
    '..\..\..\..\redaxo_cms\redaxo\src\addons\rexstan\config\rex-superglobals.neon',
    '..\..\..\..\redaxo_cms\redaxo\src\addons\rexstan\vendor\phpstan\phpstan\conf\bleedingEdge.neon',
    '..\..\..\..\redaxo_cms\redaxo\src\addons\rexstan\vendor\phpstan\phpstan-strict-rules\rules.neon',
    '..\..\..\..\redaxo_cms\redaxo\src\addons\rexstan\vendor\phpstan\phpstan-deprecation-rules\rules.neon',
    '..\..\..\..\redaxo_cms\redaxo\src\addons\rexstan\config\phpstan-phpunit.neon',
    '..\..\..\..\redaxo_cms\redaxo\src\addons\rexstan\config\phpstan-dba.neon',
    '..\..\..\..\redaxo_cms\redaxo\src\addons\rexstan\config\cognitive-complexity.neon',
    '..\..\..\..\redaxo_cms\redaxo\src\addons\rexstan\config\code-complexity.neon',
    '..\..\..\..\redaxo_cms\redaxo\src\addons\rexstan\config\dead-code.neon'
];
$addon = ['..\..\..\..\redaxo_cms\redaxo\src\addons\yform_flexible_content'];

\rexstan\RexStanUserConfig::save(9, $addon, $extensions, 80115);