<?php

class FlexibleContentIterator
{
    private array $items;
    private int $index;

    public function __construct(array $items)
    {
        $this->index = 0;
        $this->items = $items;
    }

    public function hasNext(): int
    {
        return count($this->items) > $this->index;
    }

    public function current(): array|FlexibleContent|FlexibleContentIterator
    {
        return $this->items[$this->index];
    }

    public function next(): void
    {
        ++$this->index;
    }
}
