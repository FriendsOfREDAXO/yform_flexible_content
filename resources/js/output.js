window.flexibleOutput = (data) => {
  return {
    $content: null,
    $form: data.$element.closest('form'),
    isReady: false,
    hasContent: false,
    groups: [],
    groupDefinitions: data.groupDefinitions,
    groupDetails: data.groupDetails,
    initialValue: [],
    contentString: '',
    ready () {
      this.$content = document.getElementById(data.contentId);

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
    addGroup (group, index) {
      group.groupId = this.uuid();

      if(index !== null) {
        this.groups.splice(index, 0, JSON.parse(JSON.stringify(group)));
        this.updateContent();
        return;
      }

      this.groups.push(JSON.parse(JSON.stringify(group)));
      this.updateContent();
    },
    getGroupDetailsById (id) {
      return this.groupDetails.find((group) => group.id === id);
    },
    getGroupName (id) {
      let group = this.getGroupDetailsById(id);
      return group ? group.name : '';
    },
    getFieldDefinition (id, name) {
      let group = this.getGroupDetailsById(id);
      return group.fields.find((fieldDefinition) => fieldDefinition.name === name);
    },
    setAttributes (fieldAttributes, $element) {
      if (!fieldAttributes || fieldAttributes === '') return;

      const attributes = JSON.parse(fieldAttributes);
      for (var attribute in attributes) {
        $element.setAttribute(attribute, attributes[attribute]);
      }
    },
    removeGroup (index) {
      const groupName = this.getGroupName(this.groups[index].id);
      if (!confirm('Gruppe "' + groupName + '" wirklich löschen?')) return;

      this.groups.splice(index, 1);
      this.updateContent();
    },
    updateContent () {
      this.contentString = JSON.stringify(this.groups);
      this.$content.value = this.contentString;
    },
    move (from, to) {
      this.groups.splice(to, 0, this.groups.splice(from, 1)[0]);
      this.updateContent();
    },
    moveUp (index) {
      if (index > 0) {
        this.move(index - 1, index);
      }
    },
    moveDown (index) {
      if (index < this.groups.length - 1) {
        this.move(index + 1, index);
      }
    }
  };
};