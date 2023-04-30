<div class="w-full">
    <label class="control-label" :for="fieldId" x-text="fieldDefinition.title"></label>
    <textarea type="text"
           class="form-control"
           :id="fieldId"
           x-model="field.value"
           x-init="setAttributes(fieldDefinition.attributes, $el)"
           required
           cols="30"
           rows="10"
           @keyup="updateContent()"
           @keydown.enter.prevent.stop="null"
           @blur="updateContent()">
    </textarea>
</div>