<div class="w-full" x-data="flexibleSQL">
    <label class="control-label" :for="fieldId" x-text="fieldDefinition.title"></label>
    <select class="form-control"
            name="content"
            @change="updateContent()"
            x-init="setAttributes(fieldDefinition.attributes, $el)"
            x-model="field.value"
            :disabled="!choices.length"
            :id="fieldId">
        <option value=""></option>
        <template x-for="choice in choices" :key="index">
            <option :value="choice.value"
                    :selected="choice.value == field.value"
                    x-text="choice.label"></option>
        </template>
    </select>
    <div x-cloak x-show="message" class="mt-2 font-bold alert alert-danger mb-0 p-5">
        <div x-text="message"></div>
        <code x-text="fieldDefinition.query"></code>
    </div>
</div>