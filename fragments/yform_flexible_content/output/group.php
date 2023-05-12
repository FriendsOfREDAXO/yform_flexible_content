<?php
$field = new rex_fragment();
$field = $field->parse('yform_flexible_content/output/field.php');

$dropzone = new rex_fragment();
$dropzone = $dropzone->setVar('last', false);

$addGroup = new rex_fragment();
$addGroup->setVar('button_text', $this->getVar('button_text'));
$addGroup->setVar('between_groups', true);
$addGroup = $addGroup->parse('yform_flexible_content/output/add-group.php');
?>

<div class="my-5" x-cloak x-show="hasContent">
    <template x-for="(group, groupIndex) in groups" :key="group.groupId">
        <div class="relative">

            <?= $dropzone->parse('yform_flexible_content/output/dropzone.php'); ?>

            <div class="absolute left-0 top-0 w-full flex items-center justify-center -translate-y-1/2 text-center group"
                 x-data="{dragging: false}"
                 @startdragging.window="dragging = true"
                 @enddragging.window="dragging = false"
                 :class="{
                    'pointer-events-none hidden': dragging,
                 }">
                <div class="relative">
                    <?= $addGroup ?>
                </div>
            </div>

            <div class="my-5 panel panel-edit transition-all flexible-group shadow-lg"
                 x-data="flexibleGroup($el)"
                 @startdragging.window="otherDragging = true"
                 @enddragging.window="otherDragging = false"
                 :class="{
                    'opacity-50 pointer-events-none': dragging,
                    'pointer-events-none': otherDragging,
                 }">
                <header class="panel-heading px-5 py-2">
                    <div class="panel-title">
                        <div class="flex form-group items-center justify-between mb-0">
                            <div class="flex items-center leading-none">

                                <div class="-ml-1 pr-3 cursor-grab opacity-50 hover:opacity-100 transition-opacity"
                                     @dragstart="dragStart($event); $dispatch('startdragging', { group: group, groupIndex: groupIndex })"
                                     @dragend="dragEnd($event); $dispatch('enddragging', { group: group, groupIndex: groupIndex })"
                                     draggable="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M7 2a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM7 5a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM7 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-3 3a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-3 3a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                    </svg>
                                </div>

                                <strong class="group-name" x-text="getGroupName(group.id)"></strong>
                            </div>
                            <div class="pl-5 flex space-x-2">
                                <button class="btn btn-default"
                                        :disabled="groupIndex === 0"
                                        title="<?= rex_i18n::msg('move_slice_up') ?>"
                                        @click.prevent="moveUp(groupIndex)">
                                    <i class="fa fa-chevron-up"></i>
                                </button>
                                <button class="btn btn-default"
                                        :disabled="groupIndex === groups.length - 1"
                                        title="<?= rex_i18n::msg('move_slice_down') ?>"
                                        @click.prevent="moveDown(groupIndex)">
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                                <button class="btn btn-danger"
                                        @click.prevent="removeGroup(groupIndex)"
                                        title="<?= rex_i18n::msg('yform_flexible_content_delete_group') ?>">
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

            <template x-if="groupIndex === groups.length - 1">
                <?php
                    $dropzone = $dropzone->setVar('last', true);
                    echo $dropzone->parse('yform_flexible_content/output/dropzone.php');
                ?>
            </template>
        </div>
    </template>
</div>