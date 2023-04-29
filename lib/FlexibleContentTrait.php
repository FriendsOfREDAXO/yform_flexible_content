<?php

trait FlexibleContentTrait
{
    public function getFlexibleContent(string $columnName): array
    {
        $data = [];
        $contents = json_decode($this->getValue($columnName), true);

        foreach ($contents as $content) {
            $group = [];

            foreach ($content['fields'] as $key => $field) {
                $group[] = [
                    'name' => $field['name'],
                    'type' => $field['type'],
                    'value' => $field['value'] ?? null,
                ];
            }

            $data[] = $group;
        }

        return $data;
    }
}
