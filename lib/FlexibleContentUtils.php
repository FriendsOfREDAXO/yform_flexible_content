<?php

class FlexibleContentUtils
{
    public static function stripFields(string $fields): string
    {
        $fields = json_decode($fields, true);
        foreach ($fields as &$field) {
            unset($field['name']);

            foreach ($field['fields'] as &$subField) {
                unset($subField['width'], $subField['attributes'], $subField['title'], $subField['label']);
            }
        }

        return json_encode($fields);
    }
}
