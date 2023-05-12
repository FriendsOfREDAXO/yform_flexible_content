<?php
$addField = new rex_fragment();
$addField = $addField->parse('yform_flexible_content/add-field.php');

$field = new rex_fragment();
$field = $field->parse('yform_flexible_content/field.php');
?>

<div class="my-5" x-cloak x-show="hasContent">
    <template x-for="(group, index) in groups" :key="group['id']">
        <div class="my-5 p-5 panel panel-edit">
            <div class="flex form-group items-end mb-2">
                <div class="w-full">
                    <label class="control-label" :for="'group-'+group.id+'name'"><?= rex_i18n::msg('yform_flexible_content_group_name') ?></label>
                    <input type="text"
                           class="form-control"
                           :id="'group-'+group.id+'name'"
                           x-model="group.name"
                           @keyup="updateContent()"
                           @keydown.enter.prevent.stop="null"
                           @blur="updateContent()"
                           required
                           name="type">
                </div>
                <div class="pl-5">
                    <button class="btn btn-danger"
                            @click.prevent="removeGroup(index)"
                            title="<?= rex_i18n::msg('yform_flexible_content_delete_group') ?>">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            </div>

            <div>
                <?= $field ?>
            </div>

            <?= $addField ?>
        </div>
    </template>
</div>