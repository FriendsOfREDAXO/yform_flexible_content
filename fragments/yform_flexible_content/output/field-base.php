<?php
$content = $this->getVar('content');
?>

<div class=""
     x-bind:style="field.width && { width: field.width + '%' }"
     x-data="{fieldId:'field-'+group.groupId+groupIndex+index}">
    <?= $content ?>
</div>