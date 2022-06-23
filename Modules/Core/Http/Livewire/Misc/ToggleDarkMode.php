<?php

namespace Modules\Core\Http\Livewire\Misc;

use Livewire\Component;

class ToggleDarkMode extends Component
{
    public bool $dark = true;

    public function mount()
    {
        $this->dark = session()->get('dark', true);
    }

    public function updatedDark(bool $enabled)
    {
        session()->put('dark', $enabled);
    }

    public function render()
    {
        return view('core::livewire.misc.toggle-dark-mode');
    }
}
