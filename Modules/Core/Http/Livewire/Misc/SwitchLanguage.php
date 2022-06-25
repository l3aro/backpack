<?php

namespace Modules\Core\Http\Livewire\Misc;

use Livewire\Component;

class SwitchLanguage extends Component
{
    public array $listLocale = [];

    public function mount()
    {
        $this->listLocale = config('app.locales');
    }

    public function render()
    {
        return view('core::livewire.misc.switch-language');
    }

    public function getShouldShowSwitcherProperty()
    {
        return count($this->listLocale) ? true : false;
    }

    public function setLocale($locale)
    {
        session()->put('locale', $locale);
        app()->setLocale($locale);
    }
}
