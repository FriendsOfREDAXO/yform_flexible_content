window.flexibleOutput = (data) => {
  return {
    $content: null,
    isReady: false,
    hasContent: false,
    groups: [],
    groupDefinitions: data.groupDefinitions,
    initialValue: [],
    contentString: '',
    ready () {
      this.$content = document.getElementById(data.id);

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
    addGroup (group) {
      this.groups.push(JSON.parse(JSON.stringify(group)));
      this.updateContent();
    },
    removeGroup (index) {
      this.groups.splice(index, 1);
      this.updateContent();
    },
    updateContent () {
      this.contentString = JSON.stringify(this.groups);
      this.$content.value = this.contentString;
    },
    addLink (id, field) {
      let linkMap = openLinkMap(id);
      $(linkMap).on('rex:selectLink', (event, id, name) => {
        field.value = id.replace('redaxo://', '');
        field.link = name;
        this.updateContent();
      });
    },
    removeLink (id, field) {
      deleteREXLink(id);
      field.value = '';
      field.link = '';
      this.updateContent();
    },
    openMedia (id, field) {
      let mediaManager = openREXMedia(id);
      $(mediaManager).on('rex:selectMedia', (event, filename) => {
        field.value = filename;
        this.updateContent();
      });
    },
    addMedia (id, field) {
      let mediaManager = addREXMedia(id);
      $(mediaManager).on('rex:selectMedia', (event, filename) => {
        field.value = filename;
        this.updateContent();
      });
    },
    removeMedia (id, field) {
      deleteREXMedia(id);
      field.value = '';
      field.link = '';
      this.updateContent();
    },
    moveUp (index) {
      if (index > 0) {
        this.groups.splice(index - 1, 0, this.groups.splice(index, 1)[0]);
        this.updateContent();
      }
    },
    moveDown (index) {
      if (index < this.groups.length - 1) {
        this.groups.splice(index + 1, 0, this.groups.splice(index, 1)[0]);
        this.updateContent();
      }
    }
  };
};