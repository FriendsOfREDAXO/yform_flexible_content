<div class="w-full">
    <label class="control-label" :for="fieldId" x-text="getFieldTitle(group.id, field.name)"></label>
    <input type="text"
           class="form-control"
           :id="fieldId"
           x-model="field.value"
           required
           @keyup="updateContent()"
           @blur="updateContent()"
           name="content">
</div>