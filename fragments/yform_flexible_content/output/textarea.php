<div class="w-full">
    <label class="control-label" :for="'field-'+group.id+groupIndex+index" x-text="field.title"></label>
    <textarea type="text"
           class="form-control"
           :id="'field-'+group.id+groupIndex+index"
           x-model="field.value"
           required
           cols="30"
           rows="10"
           @keyup="updateContent()"
           @blur="updateContent()">
    </textarea>
</div>