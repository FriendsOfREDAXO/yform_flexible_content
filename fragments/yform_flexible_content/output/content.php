<?php
$fields = $this->getVar('fields');
$contentId = $this->getVar('contentId');

$addGroup = new rex_fragment();
$addGroup = $addGroup->parse('yform_flexible_content/output/add-group.php');

$group = new rex_fragment();
$group = $group->parse('yform_flexible_content/output/group.php');

$script = new rex_fragment();
$script = $script->parse('yform_flexible_content/output/script.php');
?>
<?= $script ?>

<div class="form-group" id="flexible-content" x-data="flexibleOutput({groupDefinitions:<?= $fields ?>, id: '<?= $contentId ?>'})" x-on:rexready.document="ready">
    <p class="control-label">
        <strong>Flexible Content</strong>
    </p>

    <?= $group ?>

    <?= $addGroup ?>
</div>

<?= $script ?>

