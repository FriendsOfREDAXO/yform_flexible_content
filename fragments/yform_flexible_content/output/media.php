<div class="w-full" x-data="flexibleMedia">
    <label class="control-label" :for="'REX_MEDIA_'+fieldId" x-text="fieldDefinition.title"></label>

    <div class="rex-js-widget rex-js-widget-media">
        <div class="input-group">
            <input class="form-control"
                   type="text"
                   value=""
                   x-init="setAttributes(fieldDefinition.attributes, $el)"
                   x-model="field.value"
                   :id="'REX_MEDIA_'+fieldId"
                   readonly="">

            <span class="input-group-btn">
                <a href="#" class="btn btn-popup"
                   @click.prevent="openMedia(fieldId, field)"
                   title="<?= rex_i18n::msg('var_media_open') ?>">
                    <i class="rex-icon rex-icon-open-mediapool"></i>
                </a>

                <a href="#" class="btn btn-popup"
                   @click.prevent="addMedia(fieldId, field)"
                   title="<?= rex_i18n::msg('var_media_new') ?>">
                    <i class="rex-icon rex-icon-add-media"></i>
                </a>

                <a href="#" class="btn btn-popup"
                   @click.prevent="removeMedia(fieldId, field)"
                   title="<?= rex_i18n::msg('var_media_remove') ?>">
                    <i class="rex-icon rex-icon-delete-media"></i>
                </a>
            </span>
        </div>
    </div>
</div>