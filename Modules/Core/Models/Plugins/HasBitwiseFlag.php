<?php

namespace Modules\Core\Models\Plugins;

trait HasBitwiseFlag
{
    protected function getFlag(string $name, int $flag): bool
    {
        return ($this->{$name} & $flag) === $flag;
    }

    protected function setFlag(string $name, int $flag, bool $value): bool
    {
        $value ? $this->{$name} |= $flag : $this->{$name} &= ~$flag;

        return $this->getFlag($name, $flag);
    }

    protected function toggleFlag(string $name, int $flag): bool
    {
        return $this->setFlag($name, $flag, ! $this->getFlag($name, $flag));
    }

    protected function hasFlag(string $name, int $flag): bool
    {
        return $this->getFlag($name, $flag);
    }
}
