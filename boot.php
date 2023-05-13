<?php

$addon = rex_addon::get('yform_flexible_content');

if (rex::isBackend() && rex::getUser()) {
    rex_yform::addTemplatePath($this->getPath('ytemplates'));

    if ('index.php?page=yform/manager/table_field' === rex_url::currentBackendPage() ||
        'index.php?page=yform/manager/data_edit' === rex_url::currentBackendPage()) {
        rex_view::addJsFile($addon->getAssetsUrl('yform-flexible-content.js'));
        //        rex_view::addJsFile('https://cdn.tailwindcss.com');
        rex_view::addCssFile($addon->getAssetsUrl('yform-flexible-content.css'));
        rex_view::setJsProperty('yform_flexible_content', [
            'delete_group' => rex_i18n::msg('yform_flexible_content_confirm_delete_group'),
            'delete_field' => rex_i18n::msg('yform_flexible_content_confirm_delete_field'),
        ]);
    }
}
