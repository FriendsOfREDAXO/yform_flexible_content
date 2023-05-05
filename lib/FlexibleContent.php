<?php

class FlexibleContent
{
    public function __construct(array $field)
    {
        $this->field = $field;
        $this->type = $field['type'];
        $this->name = $field['name'];
        $this->value = isset($field['value']) && '' !== $field['value'] ? $field['value'] : null;
        $this->setValue();
    }

    private function setValue(): void
    {
        if (null !== $this->value && 'checkbox' === $this->type) {
            $this->value = explode(',', $this->field['value']);
        }
    }

    public function getValue(): string|array|null
    {
        if ('checkbox' === $this->type) {
            return explode(',', $this->value);
        }

        return $this->value;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
