<div class="dropdown" x-show="groupDefinitions.length">
    <button type="button"
            <?php if ($this->getVar('between_groups')) : ?>
                class="btn btn-primary btn-sm opacity-0 focus:opacity-100 group-hover:opacity-100 transition-all"
            <?php else: ?>
                class="btn btn-primary"
            <?php endif; ?>
            data-toggle="dropdown">
        <i class="fa fa-plus" aria-hidden="true"></i> <?= $this->getVar('button_text') ?>
    </button>
    <ul class="dropdown-menu">
        <template x-for="(group, index) in groupDefinitions">
            <li>
                <a href="#" @click.prevent="addGroup(group, (typeof(groupIndex) !== 'undefined' ? groupIndex : null))" x-text="getGroupName(group.id)"></a>
            </li>
        </template>
    </ul>
</div>