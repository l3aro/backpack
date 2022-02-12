<?php

namespace Modules\Core\Http\Livewire\Plugins;

trait CanDestroyRecord
{
    public $confirmingDeletion = false;
    public $confirmingId;

    public function destroy($id)
    {
        $this->confirmingDeletion = true;
        $this->confirmingId = $id;
    }

    public function confirmDelete()
    {
        if (method_exists($this, 'beforeDestroyRecord')) {
            $this->beforeDestroyRecord();
        }
        app($this->getModel())->find($this->confirmingId)->delete();
        $this->confirmingDeletion = false;
        $this->confirmingId = null;
        $this->dispatchBrowserEvent('success', ['message' => __('The record has been deleted successfully.')]);
    }
}
