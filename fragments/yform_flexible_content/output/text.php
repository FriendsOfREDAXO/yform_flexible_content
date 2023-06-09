<div class="w-full">
    <label class="control-label" :for="fieldId" x-text="fieldDefinition.title"></label>
    <input type="text"
           class="form-control"
           :id="fieldId"
           x-model="field.value"
           x-init="setAttributes(fieldDefinition.attributes, $el)"
           @keyup="updateContent()"
           @keydown.enter.prevent.stop="null"
           @blur="updateContent()"
           name="content">
</div>