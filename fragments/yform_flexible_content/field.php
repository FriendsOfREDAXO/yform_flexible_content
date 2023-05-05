<template x-for="(field, index) in group.fields">
    <div class="py-6 border-0">
        <template x-if="group.fields[index]">
            <div>
                <input type="hidden"
                       disabled
                       :value="field.type"
                       name="type">

                <p class="help-block small m-0">
                    Field Type: <strong x-text="field.label"></strong>
                </p>

                <div class="flex -mx-2 mt-4">
                    <div class="flex-1 px-2">
                        <label class="control-label" :for="group.id+index+'name'">Field Name</label>
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
                        <label class="control-label" :for="group.id+index+'title'">Field Title</label>
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
                                title="Feld löschen">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div>

                <template x-if="field.type === 'select' || field.type === 'radio' || field.type === 'checkbox'">
                    <div class="flex -mx-2 mt-4">
                        <div class="w-full px-2">
                            <label :for="'choices-'+group.id+index">Choices</label>
                            <textarea class="form-control w-full resize-y"
                                      x-model="field.choices"
                                      :id="'choices-'+group.id+index"
                                      :value="field.choices"
                                      @keyup="updateContent()"
                                      @blur="updateContent()"
                                      name="choices"
                                      rows="2">
                            </textarea>
                            <p class="help-block small mb-0">
                                Enter each choice on a new line.
                                <br>
                                For more control, you may specify both a value and label like this:
                                <code>value : Label</code> => <code>1 : First Choice</code>
                            </p>
                        </div>
                    </div>
                </template>

                <div class="flex -mx-2 mt-4">

                    <div class="w-full md:w-8/12 px-2">
                        <label :for="'attributes-'+group.id+index">Attributes</label>
                        <input type="text"
                               class="form-control"
                               x-model="field.attributes"
                               :id="'attributes-'+group.id+index"
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
                        <label class="control-label" :for="'group-'+group.id+index+'width'">Width</label>
                        <input type="number"
                               class="form-control"
                               :id="'group-'+group.id+index+'width'"
                               max="100"
                               x-model="field.width"
                               @keyup="updateContent()"
                               @keydown.enter.prevent.stop="null"
                               @blur="updateContent()"
                               name="width">
                    </div>
                </div>
            </div>
        </template>
    </div>
</template>