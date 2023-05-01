window.flexibleMedia = () => {
  return {
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
  };
};