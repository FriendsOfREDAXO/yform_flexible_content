<div class="w-full">
    <label class="control-label" :for="fieldId" x-text="getFieldTitle(group.id, field.name)"></label>
    <textarea type="text"
           class="form-control"
           :id="fieldId"
           x-model="field.value"
           required
           cols="30"
           rows="10"
           @keyup="updateContent()"
           @blur="updateContent()">
    </textarea>
</div>