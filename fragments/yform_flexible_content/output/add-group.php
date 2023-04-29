<div class="dropdown" x-show="groupDefinitions.length">
    <button class="btn btn-primary" type="button" data-toggle="dropdown">
        <i class="fa fa-plus" aria-hidden="true"></i> Add Group
    </button>
    <ul class="dropdown-menu ">
        <template x-for="(group, index) in groupDefinitions">
            <li>
                <a href="#" @click.prevent="addGroup(group)" x-text="group.name"></a>
            </li>
        </template>
    </ul>
</div>