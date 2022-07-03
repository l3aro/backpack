<?php

namespace Modules\Core\Http\Livewire\Plugins;

trait WatchLanguageChange
{
    public string $locale;

    public function mountWatchLanguageChange()
    {
        $this->locale = app()->getLocale();
    }

    public function applyLocale()
    {
        app()->setLocale($this->locale ?? session()->get('locale', config('app.locale')));
    }

    public function fetchLocale()
    {
        $this->locale = session()->get('locale', config('app.locale'));
        app()->setLocale($this->locale ?? session()->get('locale', config('app.locale')));
    }
}
