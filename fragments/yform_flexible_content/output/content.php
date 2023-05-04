<?php
$fields = $this->getVar('fields');
$contentId = $this->getVar('contentId');
$strippedFields = FlexibleContentUtils::stripFields($fields);

$addGroup = new rex_fragment();
$addGroup = $addGroup->parse('yform_flexible_content/output/add-group.php');

$group = new rex_fragment();
$group = $group->parse('yform_flexible_content/output/group.php');
?>

<div class="form-group"
     id="flexible-content"
     x-data="flexibleOutput({
        groupDefinitions: <?= rex_escape($strippedFields) ?>,
        groupDetails: <?= rex_escape($fields) ?>,
        contentId: '<?= $contentId ?>',
        })"
     x-on:rexready.document="ready">
    <p class="control-label">
        <strong>Flexible Content</strong>
    </p>

    <?= $group ?>

    <?= $addGroup ?>

    <div id="flexible-drag-ghost" class="absolute overflow-hidden h-0 w-0 -left-[500vw] -top-[-500vh]"></div>
</div>

