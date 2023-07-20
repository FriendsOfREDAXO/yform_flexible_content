window.flexibleMediaList = (id, field) => {
  return {
    $element: null,
    $select: null,
    init () {
      setTimeout(() => {
        this.$element = document.getElementById('REX_MEDIALIST_' + id);
        this.$select = document.getElementById('REX_MEDIALIST_SELECT_' + id);

        if (field.value !== '') {
          this.setInitialValues();
        }
      }, 1);
    },
    setInitialValues () {
      const values = field.value.split(',');
      const options = [];

      for (let i = 0; i < values.length; i++) {
        options.push(`<option value="${values[i]}">${values[i]}</option>`);
      }

      this.$select.innerHTML = options.join('');
      this.$element.value = field.value;
    },
    setValue () {
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
    },
  };
};