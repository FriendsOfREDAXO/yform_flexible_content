<?php
    $field = new rex_fragment();
    $field = $field->parse('yform_flexible_content/output/field.php');
?>

<div class="my-5" x-cloak x-show="hasContent">
    <template x-for="(group, groupIndex) in groups" :key="index">
        <div class="my-5 px-5 py-4 bg-white bg-opacity-50">
            <div class="flex form-group items-center justify-between">
                <h3 x-text="group.name" class="mt-0 mb-0"></h3>
                <div class="pl-5">
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