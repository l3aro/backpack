<?php

namespace Modules\Core\Enums;

abstract class BaseEnum
{
    protected $items;

    protected $labels;

    public function __construct()
    {
        $this->items = $this->getClassConstants();
        $this->labels = $this->defineLabels();
    }

    abstract protected function defineLabels(): array;

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

    public static function getLabel($key)
    {
        return (new static)->label($key);
    }
}
