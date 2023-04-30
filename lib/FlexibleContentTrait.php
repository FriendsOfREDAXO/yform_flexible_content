<?php

trait FlexibleContentTrait
{
    public function getFlexibleContent(string $columnName): array
    {
        $data = [];
        $contents = json_decode($this->getValue($columnName), true);

        foreach ($contents as $content) {
            $group = [];

            foreach ($content['fields'] as $field) {
                $group[] = new FlexibleContent($field);
            }

            $data[] = $group;
        }

        return $data;
    }
}
