window.flexibleTextarea = ($textarea) => {
  return {
    initTextarea () {
      this.setAttributes(this.fieldDefinition.attributes, $textarea)

      // wait a tiny bit for x-model to be initialized
      setTimeout(() => {
        this.initEditors();
      }, 50);
    },
    initEditors () {
      if ($textarea.classList.contains('cke5-editor')) {
        // need to pass a jQuery object to cke5_init... (╯°□°)╯︵ ┻━┻
        cke5_init($($textarea));

        // set the theme if function exists
        if (typeof cke5_set_theme === 'function') cke5_set_theme();
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

      // we need to initialize redactor manually...
      if ($textarea.attributes.class.value.includes('redactor-editor--')) {
        const className = [...$textarea.classList].filter((className) => className.startsWith('redactor-editor--'))[0];
        const profileName = className.replace('redactor-editor--', '');
        const options = redactor_profiles[profileName];
        options.lang = redactorLang;
        options.pasteImages = false;
        options['callbacks'] = {
          'blur': (e) => {
            this.field.value = $textarea.value;
            this.updateContent();
          },
        };
        const redactor = $R('#' + this.fieldId, options);
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
    },
  };
};