<div class="w-full" x-data="flexibleMediaList(fieldId, field)">
    <label class="control-label" :for="'REX_MEDIALIST_SELECT_'+fieldId" x-text="fieldDefinition.title"></label>

    <div class="rex-js-widget rex-js-widget-medialist">
        <div class="input-group">
            <select class="form-control"
                    :name="'REX_MEDIALIST_SELECT['+fieldId+']'"
                    :id="'REX_MEDIALIST_SELECT_'+fieldId"
                    size="10"></select>

            <input type="hidden"
                   :name="fieldId"
                   :id="'REX_MEDIALIST_'+fieldId"
                   value="">

            <span class="input-group-addon">
                <div class="btn-group-vertical">

                    <a href="#" class="btn btn-popup"
                       @click.prevent="moveMedia('top')"
                       title="<?= rex_i18n::msg('var_medialist_move_top') ?>">
                        <i class="rex-icon rex-icon-top"></i>
                    </a>

                    <a href="#" class="btn btn-popup"
                       @click.prevent="moveMedia('up')"
                       title="<?= rex_i18n::msg('var_medialist_move_up') ?>">
                        <i class="rex-icon rex-icon-up"></i>
                    </a>

                    <a href="#" class="btn btn-popup"
                       @click.prevent="moveMedia('down')"
                       title="<?= rex_i18n::msg('var_medialist_move_down') ?>">
                        <i class="rex-icon rex-icon-down"></i>
                    </a>

                    <a href="#" class="btn btn-popup"
                       @click.prevent="moveMedia('bottom')"
                       title="<?= rex_i18n::msg('var_medialist_move_bottom') ?>">
                        <i class="rex-icon rex-icon-bottom"></i>
                    </a>

                </div>
                <div class="btn-group-vertical">

                    <a href="#" class="btn btn-popup"
                       @click.prevent="openMediaList()"
                       title="<?= rex_i18n::msg('var_media_open') ?>">
                        <i class="rex-icon rex-icon-open-mediapool"></i>
                    </a>

                    <a href="#" class="btn btn-popup"
                       @click.prevent="addMedia()"
                       title="<?= rex_i18n::msg('var_media_new') ?>">
                        <i class="rex-icon rex-icon-add-media"></i>
                    </a>

                    <a href="#" class="btn btn-popup"
                       @click.prevent="removeMedia()"
                       title="<?= rex_i18n::msg('var_media_remove') ?>">
                        <i class="rex-icon rex-icon-delete-media"></i>
                    </a>

                </div>
            </span>
        </div>
    </div>

</div>