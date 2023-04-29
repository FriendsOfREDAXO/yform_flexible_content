window.flexibleContent = () => {
  return {
    $content: document.querySelector('textarea.flexible-content-definition'),
    isReady: false,
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
          type: 'link',
          label: 'Link',
          link: '',
        }
      ];

      types.forEach(type => {
        this.fieldTypes.push({
          type: type.type,
          label: type.label,
          title: '',
          name: '',
          width: 100,
          attributes: '',
          value: '',
        });
      });
    },
    removeGroup (index) {
      this.groups.splice(index, 1);
      this.updateContent();
    },
    removeField (group, fieldIndex) {
      group.fields.splice(fieldIndex, 1);
      this.updateContent();
    },
    updateContent () {
      this.contentString = JSON.stringify(this.groups);
      this.$content.value = this.contentString;
    },
  };
};