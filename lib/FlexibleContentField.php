<?php

class FlexibleContentField
{
    public mixed $type;
    public mixed $name;
    /** @var mixed|null */
    public mixed $value;

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

    /**
     * Get the field value
     * @return string|array|null the value of the field
     */
    public function getValue(): string|array|null
    {
        if ('checkbox' === $this->type && !is_array($this->value)) {
            return explode(',', $this->value);
        }

        return $this->value;
    }

    /**
     * Get the name of the field
     * @return string the name of the field
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the type of the field
     * @return string the type of the field
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * get the field as an array
     */
    public function getArray(): array
    {
        return [
            'type' => $this->type,
            'name' => $this->name,
            'value' => $this->value,
        ];
    }
}
