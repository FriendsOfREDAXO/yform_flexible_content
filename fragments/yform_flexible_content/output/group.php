<?php
$field = new rex_fragment();
$field = $field->parse('yform_flexible_content/output/field.php');
?>

<div class="my-5" x-cloak x-show="hasContent">
    <template x-for="(group, groupIndex) in groups" :key="group.groupId">
        <div class="my-5 panel panel-edit transition-all flexible-group shadow-lg">
            <header class="panel-heading px-5 py-2">
                <div class="panel-title">
                    <div class="flex form-group items-center justify-between mb-0">
                        <div class="flex items-center leading-none">
                            <!--                    <div class="pr-3 cursor-grab opacity-50 hover:opacity-100 transition-opacity"-->
                            <!--                         draggable="true">-->
                            <!--                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">-->
                            <!--                            <path d="M7 2a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM7 5a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM7 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-3 3a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-3 3a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>-->
                            <!--                        </svg>-->
                            <!--                    </div>-->

                            <strong x-text="getGroupName(group.id)"></strong>
                        </div>
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
                </div>
            </header>

            <div class="p-5">
                <div class="flex flex-wrap -mx-2 -mt-4">
                    <?= $field ?>
                </div>
            </div>

        </div>
    </template>
</div>