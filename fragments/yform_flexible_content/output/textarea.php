<div class="w-full" x-data="flexibleTextarea($refs.textarea)">
    <label class="control-label" :for="fieldId" x-text="fieldDefinition.title"></label>
    <textarea type="text"
           class="form-control"
           :id="fieldId"
           x-init="initTextarea"
           x-attribute:id="idChanged($el)"
           x-ref="textarea"
           x-model="field.value"
           cols="30"
           rows="10"
           @keyup="updateContent()"
           @blur="updateContent()">
    </textarea>
</div>