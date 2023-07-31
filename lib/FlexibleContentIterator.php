<?php

class FlexibleContentIterator
{
    private array $items;
    private int $index;
    private string $group;

    public function __construct(array $items, $content = null)
    {
        $this->group = '';
        $this->index = 0;
        $this->items = $items;

        if (null !== $content && isset($content['identifier'])) {
            $this->group = $content['identifier'];
        }
    }

    public function hasNext(): int
    {
        return count($this->items) > $this->index;
    }

    public function current(): array|FlexibleContentField|FlexibleContentIterator
    {
        return $this->items[$this->index];
    }

    public function next(): void
    {
        ++$this->index;
    }

    public function getGroup(): string
    {
        return $this->group;
    }
}
