<?php
$addField = new rex_fragment();
$addField = $addField->parse('yform_flexible_content/add-field.php');

$field = new rex_fragment();
$field = $field->parse('yform_flexible_content/field.php');
?>

<div class="my-5" x-cloak x-show="hasContent">
    <template x-for="(group, index) in groups" :key="group['id']">
        <div class="my-5 px-5 py-4 bg-white bg-opacity-50">
            <div class="flex form-group items-end">
                <div class="w-full">
                    <label class="control-label" :for="'group-'+group.id+'name'">Group Name</label>
                    <input type="text"
                           class="form-control"
                           :id="'group-'+group.id+'name'"
                           x-model="group.name"
                           @keyup="updateContent()"
                           @blur="updateContent()"
                           required
                           name="type">
                </div>
                <div class="pl-5">
                    <button class="btn btn-danger h-[36px]"
                            @click.prevent="removeGroup(index)"
                            title="Gruppe löschen">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            </div>

            <div class="divide-y pt-4">
                <?= $field ?>
            </div>

            <?= $addField ?>
        </div>
    </template>
</div>