<?php
$text = new rex_fragment();
$text = $text->parse('yform_flexible_content/output/text.php');

$textArea = new rex_fragment();
$textArea = $textArea->parse('yform_flexible_content/output/textarea.php');

$link = new rex_fragment();
$link = $link->parse('yform_flexible_content/output/link.php');

$media = new rex_fragment();
$media = $media->parse('yform_flexible_content/output/media.php');

$mediaList = new rex_fragment();
$mediaList = $mediaList->parse('yform_flexible_content/output/media-list.php');
?>

<template x-for="(field, index) in group.fields">
    <div class="py-4 px-2"
         x-data="{
                fieldId:'field-'+group.groupId+groupIndex+index,
                fieldDefinition: getFieldDefinition(group.id, field.name),
            }"
         x-bind:style="fieldDefinition.width && { width: fieldDefinition.width + '%' }">

        <template x-if="field.type==='text'">
            <?= $text ?>
        </template>

        <template x-if="field.type==='textarea'">
            <?= $textArea ?>
        </template>

        <template x-if="field.type==='link'">
            <?= $link ?>
        </template>

        <template x-if="field.type==='media'">
            <?= $media ?>
        </template>

        <template x-if="field.type==='mediaList'">
            <?= $mediaList ?>
        </template>
    </div>
</template>
