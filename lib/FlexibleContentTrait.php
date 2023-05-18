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
                $group[] = new FlexibleContent($field);
            }

            if ($useIterator) {
                $data[] = new FlexibleContentIterator($group);
            } else {
                $data[] = $group;
            }
        }

        return $data;
    }

    public function getIterableFlexibleContent(string $columnName): FlexibleContentIterator
    {
        return new FlexibleContentIterator($this->getFlexibleContent($columnName, true));
    }
}
