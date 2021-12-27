<?php

namespace Modules\Core\Enums;

class BaseEnum
{
    protected $items;
    protected $labels;

    public function __construct()
    {
        $this->items = $this->getClassConstants();
        $this->labels = [];
    }

    protected function getClassConstants()
    {
        $reflection = new \ReflectionClass($this);
        return $reflection->getConstants();
    }

    public function values()
    {
        return $this->items;
    }

    public function keys()
    {
        return array_keys($this->items);
    }

    public function labels()
    {
        return $this->labels;
    }

    public function label($key)
    {
        return $this->labels[$key];
    }
}
