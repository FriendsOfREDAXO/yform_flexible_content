<div class="w-full" x-data="flexibleSQL" x-init="
    if (fieldDefinition.attributes && fieldDefinition.attributes.multiple) {
        if (!Array.isArray(field.value)) {
            field.value = field.value ? [field.value] : [];
        }
    }
">
    <label class="control-label" :for="fieldId" x-text="fieldDefinition.title"></label>
    <select class="form-control"
            name="content"
            @change="updateContent()"
            x-init="setAttributes(fieldDefinition.attributes, $el)"
            x-model="field.value"
            :disabled="!choices.length"
            :id="fieldId">
        <template x-if="!(fieldDefinition.attributes && fieldDefinition.attributes.multiple)">
            <option value=""></option>
        </template>
        <template x-for="choice in choices" :key="choice.value">
            <option :value="choice.value"
                    :selected="Array.isArray(field.value)
                        ? field.value.map(String).includes(String(choice.value))
                        : String(choice.value) === String(field.value)"
                    x-text="choice.label"></option>
        </template>
    </select>
    <div x-cloak x-show="message" class="mt-2 font-bold alert alert-danger mb-0 p-5">
        <div x-text="message"></div>
        <code x-text="fieldDefinition.query"></code>
    </div>
</div>
