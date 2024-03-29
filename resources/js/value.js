window.flexibleContent = () => {
  return {
    $content: document.querySelector('textarea.flexible-content-definition'),
    isReady: false,
    showFlexibleContent: false,
    hasContent: false,
    fieldTypes: [],
    groups: [],
    fields: [],
    value: '',
    initialValue: [],
    contentString: '',
    ready () {
      this.addFieldTypes();

      if (this.$content.value) {
        this.hasContent = true;
        this.initialValue = JSON.parse(this.$content.value);
        this.groups = this.initialValue;
      }

      this.$watch('contentString', (value) => {
        this.hasContent = value && value !== '[]';
      });

      this.isReady = true;
    },
    uuid () {
      return 'xxxxxxxxxxxxxxxx'.replace(/[x]/g, (c) => {
        const r = (Math.random() * 16) | 0,
          v = c === 'x' ? r : (r & 0x3) | 0x8;
        return v.toString(16);
      });
    },
    addGroup () {
      this.groups.push({
        id: this.uuid(),
        name: '',
        identifier: '',
        fields: [],
      });
      this.updateContent();
    },
    addField (field, group) {
      group.fields.push(JSON.parse(JSON.stringify(field)));
      this.updateContent();
    },
    addFieldTypes () {
      const types = [
        {
          type: 'text',
          label: 'Text',
        },
        {
          type: 'textarea',
          label: 'Textarea',
        },
        {
          type: 'media',
          label: 'Media',
        },
        {
          type: 'mediaList',
          label: 'Media List',
        },
        {
          type: 'link',
          label: 'Link',
          link: '',
        },
        {
          type: 'linkList',
          label: 'Link List',
          link: '',
        },
        {
          type: 'select',
          label: 'Select',
        },
        {
          type: 'radio',
          label: 'Radio',
        },
        {
          type: 'checkbox',
          label: 'Checkbox',
        },
        {
          type: 'sql',
          label: 'SQL-Select',
          query: '',
        },
        {
          type: 'heading',
          label: 'Heading',
        },
      ];

      types.forEach(type => {
        this.fieldTypes.push({
          type: type.type,
          label: type.label,
          title: '',
          name: '',
          width: 100,
          attributes: '',
          notice: '',
          value: '',
        });
      });
    },
    removeGroup (index) {
      if (!confirm(rex.yform_flexible_content.delete_group.replace('##name##', this.groups[index].name))) return;

      this.groups.splice(index, 1);
      this.updateContent();
    },
    removeField (group, fieldIndex) {
      if (!confirm(rex.yform_flexible_content.delete_field.replace('##name##', group.fields[fieldIndex].title).replace('##type##', group.fields[fieldIndex].type))) return;

      group.fields.splice(fieldIndex, 1);
      this.updateContent();
    },
    updateContent () {
      this.contentString = JSON.stringify(this.groups);
      this.$content.value = this.contentString;
    },
    move (group, from, to) {
      group.fields.splice(to, 0, group.fields.splice(from, 1)[0]);
      this.updateContent();
    },
    moveUp (group, index) {
      if (index > 0) {
        this.move(group, index - 1, index);
      }
    },
    moveDown (group, index) {
      if (index < this.groups.length - 1) {
        this.move(group, index + 1, index);
      }
    },
  };
};