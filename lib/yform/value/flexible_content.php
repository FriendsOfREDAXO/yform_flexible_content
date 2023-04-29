<?php

/**
 * yform.
 *
 * @author jan.kristinus[at]redaxo[dot]org Jan Kristinus
 * @author <a href="http://www.yakamara.de">www.yakamara.de</a>
 */

class rex_yform_value_flexible_content extends rex_yform_value_abstract
{
    public function getValue($raw = false)
    {
        if ($raw) {
            return $this->value;
        }

        $value = json_decode($this->value, true);

        if (is_array($value)) {
            return $value;
        }

        return [];
    }

    public function enterObject()
    {
        $this->setValue((string) $this->getValue(true));

        if ($this->saveInDb()) {
            $this->params['value_pool']['sql'][$this->getName()] = $this->getValue(true);
        }

        if ($this->needsOutput()) {
            $this->params['form_output'][$this->getId()] = $this->parse('value.flexible_content.tpl.php');
        }

        if ($this->needsOutput() && $this->isViewable()) {
            $templateParams = [];
            if (!$this->isEditable()) {
                $attributes = empty($this->getElement('attributes')) ? [] : json_decode($this->getElement('attributes'), true);
                $attributes['readonly'] = 'readonly';
                $this->setElement('attributes', json_encode($attributes));
                $this->params['form_output'][$this->getId()] = $this->parse(['value.flexible_content.tpl.php'], $templateParams);
            } else {
                $this->params['form_output'][$this->getId()] = $this->parse('value.flexible_content.tpl.php', $templateParams);
            }
        }

        if ($this->saveInDb()) {
            $this->params['value_pool']['sql'][$this->getName()] = $this->getValue(true);
        }
    }

//    public function getDescription(): string
//    {
//        return 'textarea|name|label|default|[no_db]|[attributes]|notice';
//    }

    public function getDefinitions(): array
    {
        $content = new rex_fragment();
        $content->setVar('class', 'info');
        $content = $content->parse('yform_flexible_content/content.php');

        $script = new rex_fragment();
        $script = $script->parse('yform_flexible_content/script.php');

        return [
            'type' => 'value',
            'name' => 'flexible_content',
            'values' => [
                'name' => ['type' => 'name', 'label' => rex_i18n::msg('yform_values_defaults_name')],
                'label' => ['type' => 'text', 'label' => rex_i18n::msg('yform_values_defaults_label')],

                'script' => ['type' => 'html', 'html' => $script],
                'start' => ['type' => 'html', 'html' => '<div id="flexible-content" x-data="flexibleContent" x-on:rexready.document="ready">'],

                'flexible_fields' => ['type' => 'textarea', 'attributes' => ['class' => 'flexible-content-definition form-control hidden']],

                'content_definition' => ['type' => 'html', 'html' => $content, 'label' => rex_i18n::msg('yform_values_textarea_default')],
                'notice' => ['type' => 'text', 'label' => rex_i18n::msg('yform_values_defaults_notice')],

                'end' => ['type' => 'html', 'html' => '</div>'],
            ],
            'description' => rex_i18n::msg('yform_values_flexible_content_description'),
            'db_type' => ['text'],
            'search' => false,
            'list_hidden' => false,
            'famous' => false,
        ];
    }
}
