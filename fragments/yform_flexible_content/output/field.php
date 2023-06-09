<?php
$text = new rex_fragment();
$text = $text->parse('yform_flexible_content/output/text.php');

$textArea = new rex_fragment();
$textArea = $textArea->parse('yform_flexible_content/output/textarea.php');

$link = new rex_fragment();
$link = $link->parse('yform_flexible_content/output/link.php');

$linkList = new rex_fragment();
$linkList = $linkList->parse('yform_flexible_content/output/link-list.php');

$media = new rex_fragment();
$media = $media->parse('yform_flexible_content/output/media.php');

$mediaList = new rex_fragment();
$mediaList = $mediaList->parse('yform_flexible_content/output/media-list.php');

$choice = new rex_fragment();
$choice = $choice->parse('yform_flexible_content/output/choice.php');

$sql = new rex_fragment();
$sql = $sql->parse('yform_flexible_content/output/sql.php');

$heading = new rex_fragment();
$heading = $heading->parse('yform_flexible_content/output/heading.php');
?>

<template x-for="(field, index) in group.fields">
    <div class="my-2 px-2"
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

        <template x-if="field.type==='linkList'">
            <?= $linkList ?>
        </template>

        <template x-if="field.type==='media'">
            <?= $media ?>
        </template>

        <template x-if="field.type==='mediaList'">
            <?= $mediaList ?>
        </template>

        <template x-if="field.type==='select'||field.type==='checkbox'||field.type==='radio'">
            <?= $choice ?>
        </template>

        <template x-if="field.type==='sql'">
            <?= $sql ?>
        </template>

        <template x-if="field.type==='heading'">
            <?= $heading ?>
        </template>

        <template x-if="fieldDefinition.notice">
            <p class="help-block small mb-0" x-html="fieldDefinition.notice"></p>
        </template>
    </div>
</template>
