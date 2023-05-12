<div class="w-full" x-data="flexibleLink">
    <label class="control-label" :for="'REX_LINK_'+fieldId+'_NAME'" x-text="fieldDefinition.title"></label>

    <div class="input-group">
        <input class="form-control"
               type="text"
               value=""
               x-model="field.link"
               x-init="setAttributes(fieldDefinition.attributes, $el)"
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
               title="<?= rex_i18n::msg('var_link_open') ?>">
                <i class="rex-icon rex-icon-open-linkmap"></i>
            </a>
            <a href="#"
               class="btn btn-popup"
               @click.prevent="removeLink(fieldId, field)"
               title="<?= rex_i18n::msg('var_link_delete') ?>">
                <i class="rex-icon rex-icon-delete-link"></i>
            </a>
        </span>
    </div>
</div>