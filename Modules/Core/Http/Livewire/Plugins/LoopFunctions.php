<?php

namespace Modules\Core\Http\Livewire\Plugins;

use MichaelRubel\LoopFunctions\Traits\LoopFunctions as TraitsLoopFunctions;

trait LoopFunctions
{
    use TraitsLoopFunctions;

    private bool $canOverrideValue = true;

    private function shouldOverrideValue(): bool
    {
        return $this->canOverrideValue;
    }

    /**
     * @param int|string $key
     *
     * @return bool
     * @throws \ReflectionException
     */
    private function canAssignValue(int|string $key): bool
    {
        return is_string($key)
            && $this->checksPropertyExists($key)
            && ($this->shouldOverrideValue() || empty($this->{$key}) || $this->hasDefaultValue($key));
    }
}
