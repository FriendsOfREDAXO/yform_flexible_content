<div class="w-full">
    <label class="control-label" :for="'field-'+group.id+groupIndex+index" x-text="field.title"></label>
    <input type="text"
           class="form-control"
           :id="'field-'+group.id+groupIndex+index"
           x-model="field.value"
           required
           @keyup="updateContent()"
           @blur="updateContent()"
           name="content">
</div>