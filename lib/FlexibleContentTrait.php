<?php

trait FlexibleContentTrait
{
    public function getFlexibleContent(string $columnName, bool $useIterator = false): array
    {
        $data = [];
        $contents = json_decode($this->getValue($columnName), true);

        foreach ($contents as $content) {
            $group = [];

            foreach ($content['fields'] as $field) {
                $group[] = new FlexibleContentField($field);
            }

            if ($useIterator) {
                $data[] = new FlexibleContentIterator($group, $content);
            } else {
                $data[] = new FlexibleContentGroup($group, $content['identifier'] ?? '');
            }
        }

        return $data;
    }

    public function getIterableFlexibleContent(string $columnName): FlexibleContentIterator
    {
        return new FlexibleContentIterator($this->getFlexibleContent($columnName, true));
    }
}
