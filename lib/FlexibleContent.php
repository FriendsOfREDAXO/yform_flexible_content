<?php

class FlexibleContent
{
    public function __construct(array $fields)
    {
        $this->fields = $fields;
        $this->type = $fields['type'];
        $this->name = $fields['name'];
        $this->value = isset($fields['value']) && $fields['value'] !== '' ? $fields['value'] : null;
    }

    public function getValue(): string|null
    {
        return $this->value;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
