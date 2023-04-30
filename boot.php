<?php

$addon = rex_addon::get('yform_flexible_content');

if (rex::isBackend() && rex::getUser()) {
    rex_yform::addTemplatePath($this->getPath('ytemplates'));

    if ('index.php?page=yform/manager/table_field' === rex_url::currentBackendPage() ||
        'index.php?page=yform/manager/data_edit' === rex_url::currentBackendPage()) {
        rex_view::addJsFile($addon->getAssetsUrl('yform-flexible-content.js'));
        //        rex_view::addJsFile('https://cdn.tailwindcss.com');
        rex_view::addCssFile($addon->getAssetsUrl('yform-flexible-content.css'));
    }
}

/**
 * @internal
 */
class Test extends \rex_yform_manager_dataset
{
    use FlexibleContentTrait;
}

rex_yform_manager_dataset::setModelClass(
    'rex_test',
    Test::class,
);

//dump(Test::get(1)->getFlexibleContent('flex'));
