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

    public function getItems(): array
    {
        return $this->items;
    }

    public function __call(string $name, $arr): self
    {
        if (!is_callable($this->operations[$name])) {
            throw new \Exception('No such operation');
        }

        $result = $this->operations[$name]($this->items);

        return new Pipeline($result, $this->operations);
    }
}
