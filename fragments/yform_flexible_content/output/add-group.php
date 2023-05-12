<div class="dropdown" x-show="groupDefinitions.length">
    <button class="btn btn-primary" type="button" data-toggle="dropdown">
        <i class="fa fa-plus" aria-hidden="true"></i> <?= $this->getVar('button_text') ?>
    </button>
    <ul class="dropdown-menu">
        <template x-for="(group, index) in groupDefinitions">
            <li>
                <a href="#" @click.prevent="addGroup(group)" x-text="getGroupName(group.id)"></a>
            </li>
        </template>
    </ul>
</div>