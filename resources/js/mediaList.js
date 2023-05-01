window.flexibleMediaList = (id, field) => {
  return {
    $element: null,
    init () {
      setTimeout(() => {
        this.$element = document.getElementById('REX_MEDIALIST_' + id);
      }, 1);
    },
    setValue () {
      // x-model not working for hidden inputs...
      field.value = this.$element.value;
    },
    updateValues () {
      this.setValue();
      this.updateContent();
    },
    openMediaList () {
      let mediaManager = openREXMedialist(id);
      mediaManager.addEventListener('beforeunload', () => this.updateValues());
    },
    addMedia () {
      let mediaManager = addREXMedialist(id);
      mediaManager.addEventListener('beforeunload', () => this.updateValues());
    },
    removeMedia () {
      deleteREXMedialist(id);
      field.value = '';
      field.link = '';
      this.updateValues();
    },
    moveMedia (direction) {
      moveREXMedialist(id, direction);
      this.updateValues();
    }
  };
};