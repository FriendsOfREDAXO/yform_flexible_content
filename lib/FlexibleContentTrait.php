<?php

trait FlexibleContentTrait
{
    public function getFlexibleContent(string $columnName): array
    {
        $data = [];
        $contents = json_decode($this->getValue($columnName), true);

        foreach ($contents as $content) {
            $fields = array_reduce($content['fields'], 'array_merge', []);
            $data[] = array_intersect_key($fields, array_flip(['name', 'type', 'value']));
        }

        return $data;
    }
}
