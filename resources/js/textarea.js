window.flexibleTextarea = ($textarea) => {
  return {
    init () {
      this.setAttributes(this.fieldDefinition.attributes, $textarea)
      this.initEditors();
    },
    initEditors () {
      if ($textarea.classList.contains('cke5-editor')) {
        // need to pass a jQuery object to cke5_init... (╯°□°)╯︵ ┻━┻
        setTimeout(() => {
          cke5_init($($textarea));
        }, 1);

        return;
      }

      if ($textarea.attributes.class.value.includes('markitupEditor')) {
        markitupInit();

        // additional blur event listener to update the field value
        $textarea.addEventListener('blur', () => {
          this.field.value = $textarea.value;
          this.updateContent();
        });

        return;
      }
    },
    idChanged ($element) {
      // ckeditor5 should be initialized after the id is changed
      if ($element.classList.contains('cke5-editor') && $element.id.startsWith('ck')) {
        setTimeout(() => {
          // throttle view change event a bit
          const editorChanged = Alpine.throttle(() => this.ckEditorChanged(ckeditors[$element.id]), 250);
          ckeditors[$element.id].editing.view.on('change', (event) => editorChanged());
        }, 100);
      }
    },
    ckEditorChanged(editor) {
      this.field.value = editor.getData();
      this.updateContent();
    }
  };
};