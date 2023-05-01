window.flexibleLinkList = (id, field) => {
  return {
    $element: null,
    $select: null,
    init () {
      setTimeout(() => {
        this.$element = document.getElementById('REX_LINKLIST_' + id);
        this.$select = document.getElementById('REX_LINKLIST_SELECT_' + id);

        if (field.value !== '') {
          this.setInitialValues();
        }
      }, 1);
    },
    setInitialValues () {
      const values = field.value.split(',');
      const labels = field.label.split(',');
      const options = [];

      for (let i = 0; i < values.length; i++) {
        options.push(`<option value="${values[i]}">${labels[i]}</option>`);
      }

      this.$select.innerHTML = options.join('');
      this.$element.value = field.value;
    },
    setValue () {
      const values = [];
      const labels = [];

      for (let i = 0; i < this.$select.options.length; i++) {
        values.push(this.$select.options[i].value);
        labels.push(this.$select.options[i].text);
      }

      field.value = values.join();
      field.label = labels.join();
    },
    updateValues () {
      this.setValue();
      this.updateContent();
    },
    addLink () {
      let linkList = openREXLinklist(id);
      linkList.addEventListener('beforeunload', () => this.updateValues());
    },
    removeLink () {
      deleteREXLinklist(id);
      field.value = '';
      field.link = '';
      this.updateValues();
    },
    moveLink (direction) {
      moveREXLinklist(id, direction);
      this.updateValues();
    }
  };
};