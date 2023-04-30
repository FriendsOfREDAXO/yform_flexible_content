<div class="w-full">
    <label class="control-label" :for="'REX_LINK_'+fieldId+'_NAME'" x-text="getFieldTitle(group.id, field.name)"></label>

    <div class="input-group">
        <input class="form-control"
               type="text"
               value=""
               x-model="field.link"
               :id="'REX_LINK_'+fieldId+'_NAME'"
               readonly="readonly">

        <input type="hidden"
               x-model="field.value"
               :id="'REX_LINK_'+fieldId"
               value="1">

        <span class="input-group-btn">
            <a href="#"
               class="btn btn-popup"
               @click.prevent="addLink('REX_LINK_'+fieldId, field)"
               title="Link auswählen">
                <i class="rex-icon rex-icon-open-linkmap"></i>
            </a>
            <a href="#"
               class="btn btn-popup"
               @click.prevent="removeLink(fieldId, field)"
               title="Ausgewählten Link löschen">
                <i class="rex-icon rex-icon-delete-link"></i>
            </a>
        </span>
    </div>
</div>