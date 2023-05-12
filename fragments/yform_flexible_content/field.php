<template x-for="(field, index) in group.fields">
    <div>
        <template x-if="group.fields[index]">
            <div class="my-5 panel panel-edit shadow-lg">
                <input type="hidden"
                       disabled
                       :value="field.type"
                       name="type">

                <header class="panel-heading px-5">
                    <div class="panel-title">
                        <?= rex_i18n::msg('yform_flexible_content_field_type') ?>: <strong x-text="field.label"></strong>
                    </div>
                </header>

                <div class="p-5">

                    <div class="flex -mx-2">
                        <div class="flex-1 px-2">
                            <label class="control-label" :for="group.id+index+'name'"><?= rex_i18n::msg('yform_flexible_content_field_name') ?></label>
                            <input type="text"
                                   class="form-control"
                                   :id="group.id+index+'name'"
                                   x-model="field.name"
                                   required
                                   @keyup="updateContent()"
                                   @keydown.enter.prevent.stop="null"
                                   @blur="updateContent()"
                                   placeholder="field_name"
                                   name="name">
                        </div>

                        <div class="flex-1 px-2">
                            <label class="control-label" :for="group.id+index+'title'"><?= rex_i18n::msg('yform_flexible_content_field_title') ?></label>
                            <input type="text"
                                   class="form-control"
                                   :id="group.id+index+'title'"
                                   x-model="field.title"
                                   required
                                   @keyup="updateContent()"
                                   @keydown.enter.prevent.stop="null"
                                   @blur="updateContent()"
                                   placeholder="Field Title"
                                   name="title">
                        </div>

                        <div class="px-2 flex items-end justify-end">
                            <button class="btn btn-danger h-[36px]"
                                    @click.prevent="removeField(group, index)"
                                    title="<?= rex_i18n::msg('yform_flexible_content_delete_field') ?>">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>

                    <!-- choices -->
                    <template x-if="field.type === 'select' || field.type === 'radio' || field.type === 'checkbox'">
                        <div class="flex -mx-2 mt-4">
                            <div class="w-full px-2">
                                <label :for="group.id+index+'choices'"><?= rex_i18n::msg('yform_flexible_content_choices') ?></label>
                                <textarea class="form-control w-full resize-y"
                                          x-model="field.choices"
                                          :id="group.id+index+'choices'"
                                          :value="field.choices"
                                          @keyup="updateContent()"
                                          @blur="updateContent()"
                                          name="choices"
                                          rows="2">
                                </textarea>
                                <p class="help-block small mb-0">
                                    <?= rex_i18n::msg('yform_flexible_content_choices_hint') ?>
                                </p>
                            </div>

                            <template x-if="field.type !== 'select'">
                                <div class="w-auto px-2">
                                    <label :for="group.id+index+'inline'">Inline</label>
                                    <br>
                                    <input type="checkbox"
                                           :id="group.id+index+'inline'"
                                           value="1"
                                           name="inline"
                                           x-model="field.inline"
                                           @change="updateContent()">
                                    <i class="form-helper"></i>
                                    <p class="help-block small mb-0 whitespace-nowrap">
                                        <?= rex_i18n::msg('yform_flexible_content_show_choices_inline') ?>
                                    </p>
                                </div>
                            </template>
                        </div>
                    </template>

                    <!-- sql select -->
                    <template x-if="field.type === 'sql'">
                        <div class="flex -mx-2 mt-4">
                            <div class="w-full px-2">
                                <label :for="group.id+index+'query'">Query</label>
                                <input type="text"
                                       class="form-control"
                                       :id="group.id+index+'query'"
                                       x-model="field.query"
                                       required
                                       @keyup="updateContent()"
                                       @keydown.enter.prevent.stop="null"
                                       @blur="updateContent()"
                                       placeholder="SELECT id, name FROM table"
                                       name="query">
                                <p class="help-block small mb-0">
                                    <code>SELECT id AS value, name AS label FROM country</code>
                                </p>
                            </div>
                        </div>
                    </template>

                    <div class="flex -mx-2 mt-4">

                        <div class="w-full md:w-8/12 px-2">
                            <label :for="group.id+index+'attributes'"><?= rex_i18n::msg('yform_flexible_content_field_attributes') ?></label>
                            <input type="text"
                                   class="form-control"
                                   x-model="field.attributes"
                                   :id="group.id+index+'attributes'"
                                   :value="field.attributes"
                                   @keyup="updateContent()"
                                   @keydown.enter.prevent.stop="null"
                                   @blur="updateContent()"
                                   name="attributes">
                            <p class="help-block small mb-0">
                                {"class":"class-1 class-2", "data-name": "name"}
                            </p>
                        </div>

                        <div class="w-full md:w-4/12 px-2">
                            <label class="control-label" :for="group.id+index+'width'"><?= rex_i18n::msg('yform_flexible_content_field_width') ?></label>
                            <input type="number"
                                   class="form-control"
                                   :id="group.id+index+'width'"
                                   max="100"
                                   x-model="field.width"
                                   @keyup="updateContent()"
                                   @keydown.enter.prevent.stop="null"
                                   @blur="updateContent()"
                                   name="width">
                        </div>
                    </div>

                    <!-- notice -->
                    <div class="flex -mx-2 mt-4">
                        <div class="w-full px-2">
                            <label class="control-label" :for="group.id+index+'notice'"><?= rex_i18n::msg('yform_flexible_content_field_notice') ?></label>
                            <input type="text"
                                   class="form-control"
                                   :id="group.id+index+'notice'"
                                   max="100"
                                   x-model="field.notice"
                                   @keyup="updateContent()"
                                   @keydown.enter.prevent.stop="null"
                                   @blur="updateContent()"
                                   name="notice">
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
</template>