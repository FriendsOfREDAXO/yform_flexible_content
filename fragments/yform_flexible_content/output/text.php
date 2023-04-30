<div class="w-full">
    <label class="control-label" :for="fieldId" x-text="fieldDefinition.title"></label>
    <input type="text"
           class="form-control"
           :id="fieldId"
           x-model="field.value"
           required
           @keyup="updateContent()"
           @blur="updateContent()"
           name="content">
</div>