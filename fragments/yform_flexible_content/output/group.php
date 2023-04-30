<?php
$field = new rex_fragment();
$field = $field->parse('yform_flexible_content/output/field.php');
?>

<div class="my-5" x-cloak x-show="hasContent">
    <template x-for="(group, groupIndex) in groups" :key="group.groupId">
        <div class="my-5 px-5 py-4 panel panel-edit">
            <div class="flex form-group items-center justify-between">
                <h3 x-text="getGroupName(group.id)" class="mt-0 mb-0"></h3>
                <div class="pl-5 flex space-x-2">
                    <button class="btn btn-default"
                            :disabled="groupIndex === 0"
                            @click.prevent="moveUp(groupIndex)">
                        <i class="fa fa-chevron-up"></i>
                    </button>
                    <button class="btn btn-default"
                            :disabled="groupIndex === groups.length - 1"
                            @click.prevent="moveDown(groupIndex)">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <button class="btn btn-danger"
                            @click.prevent="removeGroup(groupIndex)"
                            title="Gruppe löschen">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            </div>

            <hr class="mb-3">

            <div class="flex flex-wrap -mx-2">
                <?= $field ?>
            </div>

        </div>
    </template>
</div>