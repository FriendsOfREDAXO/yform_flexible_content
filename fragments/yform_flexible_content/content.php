<?php
$addGroup = new rex_fragment();
$addGroup = $addGroup->parse('yform_flexible_content/add-group.php');

$group = new rex_fragment();
$group = $group->parse('yform_flexible_content/group.php');
?>

<div class="form-group">
    <p class="control-label">
        <strong>Flexible Content</strong>
    </p>

    <?= $group ?>

    <?= $addGroup ?>
</div>