<?php

namespace Argentum88\OOP\Pipeline;

class Pipeline
{
    /** @var array*/
    private $items;

    /** @var \Closure[] */
    private $operations;

    public function __construct(array $items, array $operations)
    {
        $this->items = $items;
        $this->operations = $operations;
    }

    public function apply()
    {
        foreach ($this->operations as $operation) {
            $this->items = $operation($this->items);
        }

        return $this->items;
    }
}
