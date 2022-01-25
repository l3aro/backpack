<?php

namespace Modules\Core\Http\Livewire\Plugins;

use Illuminate\Support\Facades\DB;

trait CanReorderRecord
{
    public function reorder($reorderedIds)
    {
        DB::beginTransaction();
        try {
            $listName = $this->recordListName;
            foreach ($reorderedIds as $index => $id) {
                $oldIndex = $this->$listName[$index];
                if ($id['value'] === $oldIndex->id) {
                    continue;
                }
                $swapItem = app($this->getModel())->find($id['value']);
                $swapItem->update(['priority' => $oldIndex->priority]);
            }
            DB::commit();
            $this->forgetComputed($listName);
            $this->dispatchBrowserEvent('reordered');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
