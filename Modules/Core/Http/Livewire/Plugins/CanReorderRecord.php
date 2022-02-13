<?php

namespace Modules\Core\Http\Livewire\Plugins;

use Illuminate\Support\Arr;

trait CanReorderRecord
{
    public function reorder($reorderedItems)
    {
        app($this->getModel())->setNewOrder(Arr::pluck($reorderedItems, 'value'));
        $this->dispatchBrowserEvent('reordered');
    }
}
