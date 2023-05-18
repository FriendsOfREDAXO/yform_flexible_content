<?php

class FlexibleContent
{
    private mixed $type;
    private mixed $name;
    /**
     * @var mixed|null
     */
    private mixed $value;

    public function __construct(array $field)
    {
        $this->type = $field['type'];
        $this->name = $field['name'];
        $this->value = isset($field['value']) && '' !== $field['value'] ? $field['value'] : null;
        $this->setValue();
    }

    private function setValue(): void
    {
        if (null !== $this->value && 'checkbox' === $this->type) {
            $this->value = explode(',', $this->value);
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
