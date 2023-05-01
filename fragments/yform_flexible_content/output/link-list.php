<div class="w-full" x-data="flexibleLinkList(fieldId, field)">
    <label class="control-label" :for="'REX_LINKLIST_SELECT_'+fieldId" x-text="fieldDefinition.title"></label>

    <div class="input-group">
        <select class="form-control"
                :name="'REX_LINKLIST_SELECT['+fieldId+']'"
                :id="'REX_LINKLIST_SELECT_'+fieldId"
                size="10"></select>

        <input type="hidden"
               :name="fieldId"
               :id="'REX_LINKLIST_'+fieldId"
               value="">

        <span class="input-group-addon">
            <div class="btn-group-vertical">
                    <a href="#"
                       class="btn btn-popup"
                       @click.prevent="moveLink('top')"
                       title="<?= rex_i18n::msg('var_linklist_move_top') ?>">
                        <i class="rex-icon rex-icon-top"></i>
                    </a>

                    <a href="#"
                       class="btn btn-popup"
                       @click.prevent="moveLink('up')"
                       title="<?= rex_i18n::msg('var_linklist_move_up') ?>">
                        <i class="rex-icon rex-icon-up"></i>
                    </a>

                    <a href="#"
                       class="btn btn-popup"
                       @click.prevent="moveLink('down')"
                       title="<?= rex_i18n::msg('var_linklist_move_down') ?>">
                        <i class="rex-icon rex-icon-down"></i>
                    </a>

                    <a href="#"
                       class="btn btn-popup"
                       @click.prevent="moveLink('bottom')"
                       title="<?= rex_i18n::msg('var_linklist_move_bottom') ?>">
                        <i class="rex-icon rex-icon-bottom"></i>
                    </a>
            </div>

            <div class="btn-group-vertical">

                    <a href="#"
                       class="btn btn-popup"
                       @click.prevent="addLink()"
                       title="<?= rex_i18n::msg('var_link_open') ?>">
                        <i class="rex-icon rex-icon-open-linkmap"></i>
                    </a>

                    <a href="#"
                       class="btn btn-popup"
                       @click.prevent="removeLink()"
                       title="<?= rex_i18n::msg('var_link_delete') ?>">
                        <i class="rex-icon rex-icon-delete-link"></i>
                    </a>
            </div>
        </span>
    </div>
</div>