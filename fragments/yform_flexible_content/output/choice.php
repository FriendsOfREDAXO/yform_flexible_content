<div class="w-full" x-data="flexibleChoice">

    <template x-if="fieldDefinition.type==='select'">
        <div>
            <label class="control-label" :for="fieldId" x-text="fieldDefinition.title"></label>
            <select class="form-control"
                    name="content"
                    @change="updateContent()"
                    x-init="setAttributes(fieldDefinition.attributes, $el);"
                    x-model="field.value"
                    :id="fieldId">
                <template x-for="choice in choices" :key="index">
                    <option :value="choice.value"
                            :selected="choice.value === field.value"
                            x-text="choice.label"></option>
                </template>
            </select>
        </div>
    </template>

    <template x-if="fieldDefinition.type==='radio'">
        <div>
            <p class="control-label font-bold" x-text="fieldDefinition.title"></p>

            <div :class="{ 'flex flex-wrap space-x-4 -mt-2 -mx-2': fieldDefinition.inline }">
                <template x-for="(choice, index) in choices" :key="index">
                    <div class="radio" :class="{ 'mt-2': fieldDefinition.inline }">
                        <label>
                            <input type="radio"
                                   :name="fieldId+'-radio'"
                                   @change="updateContent()"
                                   x-init="setAttributes(fieldDefinition.attributes, $el);"
                                   x-model="field.value"
                                   :value="choice.value">
                            <span x-text="choice.label"></span>
                        </label>
                    </div>
                </template>
            </div>
        </div>
    </template>

    <template x-if="fieldDefinition.type==='checkbox'">
        <div x-init="initCheckbox()">
            <p class="control-label font-bold" x-text="fieldDefinition.title"></p>

            <div :class="{ 'flex flex-wrap space-x-4 -mt-2 -mx-2': fieldDefinition.inline }">
                <template x-for="(choice, index) in choices" :key="index">
                    <div class="checkbox" :class="{ 'mt-2': fieldDefinition.inline }">
                        <label>
                            <input type="checkbox"
                                   @change="updateContent()"
                                   x-init="setAttributes(fieldDefinition.attributes, $el);"
                                   x-model="checkboxes"
                                   :value="choice.value">
                            <span x-text="choice.label"></span>
                        </label>
                    </div>
                </template>
            </div>
        </div>
    </template>

</div>