window.flexibleChoice = () => {
  return {
    choices: [],
    checkboxes: [],
    init() {
      const choices = this.fieldDefinition.choices.split(/\r?\n/);
      choices.forEach((choice, index) => {
        const choiceObject = {};
        const choiceParts = choice.split(' : ');

        choiceObject['value'] = choiceParts[0];
        choiceObject['label'] = choiceParts[1];

        // set value as label if label is not set
        if (choiceParts[1] === undefined) {
          choiceObject['label'] = choiceParts[0];
        }

        this.choices.push(choiceObject);
      });
    },
    initCheckbox() {
      // explode value for checkboxes
      if (this.field.value !== '' && this.field.value !== undefined) {
        this.checkboxes = this.field.value.split(',');
      }

      // join checked checkboxes and set value
      this.$watch('checkboxes', () => {
        this.field.value = this.checkboxes.join(',');
      });
    }
  };
};