window.flexibleLink = () => {
  return {
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
  };
};