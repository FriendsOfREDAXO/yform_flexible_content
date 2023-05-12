<button class="btn btn-primary" @click.prevent="addGroup()" x-cloak x-show="isReady">
    <i class="fa fa-plus" aria-hidden="true"></i> <?= rex_i18n::msg('yform_flexible_content_add_group') ?>
</button>