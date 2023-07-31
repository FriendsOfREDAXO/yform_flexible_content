<?php

class FlexibleContentGroup
{
    /**
     * @var array the fields of the group
     */
    public array $fields;

    /**
     * @var string the identifier of the group
     */
    public string $name;

    public function __construct(array $fields = [], string $identifier = '')
    {
        $this->fields = $fields;
        $this->name = $identifier;
    }

    private function setValue(): void
    {
        if (null !== $this->value && 'checkbox' === $this->type) {
            $this->value = explode(',', $this->value);
        }
    }

    /**
     * Get the field from the group
     * @param $fieldName string|null the name of the field
     * @return null|FlexibleContentField the field or null if not found
     */
    public function getField(string $fieldName = null): null|FlexibleContentField
    {
        if (empty($this->fields)) {
            return null;
        }

        foreach ($this->fields as $field) {
            /** @var FlexibleContentField $field */
            if ($field->getName() === $fieldName) {
                return $field;
            }
        }

        return null;
    }

    /**
     * Get the identifier of the group
     * @return string the identifier of the group
     */
    public function getName(): string
    {
        return $this->name;
    }
}
