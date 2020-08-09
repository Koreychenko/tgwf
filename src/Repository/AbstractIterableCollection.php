<?php

namespace TelegramWorkflow\Repository;

use Countable;
use InvalidArgumentException;
use Iterator;

class AbstractIterableCollection implements Iterator, Countable
{
    protected array $items = [];

    protected string $itemType;

    protected string $pointer;

    public function __construct(array $items)
    {
        if (count($items) === 0) {
            throw new InvalidArgumentException('Items array shouldn\'t be empty');
        }

        /* This is just a small array structure check */
        foreach ($items as $itemName => $item) {
            if (!is_string($itemName)) {
                throw new InvalidArgumentException('Item name should be string');
            }

            if (!($item instanceof $this->itemType)) {
                throw new InvalidArgumentException(sprintf('Item should implement %s', $this->itemType));
            }
        }

        $this->items = $items;
    }

    public function getItem(string $itemName)
    {
        if (array_key_exists($itemName, $this->items)) {
            return $this->items[$itemName];
        }

        return null;
    }

    public function getFirstItemName(): string
    {
        return array_keys($this->items)[0];
    }

    public function getNextItemName(string $stepName): ?string
    {
        $stepNames = array_keys($this->items);
        $currentStepIndex = array_search($stepName, $stepNames);

        if (array_key_exists($currentStepIndex + 1, $stepNames)) {
            return $stepNames[$currentStepIndex + 1];
        }

        return null;
    }

    public function current()
    {
        return $this->items[$this->pointer];
    }

    public function next()
    {
        $nextPointer = $this->getNextItemName($this->pointer);
        if ($nextPointer) {
            $this->pointer = $nextPointer;
        } else {
            $this->pointer = '';
        }
    }

    public function key()
    {
        return $this->pointer;
    }

    public function valid()
    {
        return array_key_exists($this->pointer, $this->items);
    }

    public function rewind()
    {
        $this->pointer = $this->getFirstItemName();
    }

    public function count()
    {
        return count($this->items);
    }
}