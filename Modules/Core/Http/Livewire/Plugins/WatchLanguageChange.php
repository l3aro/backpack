<?php

namespace Modules\Core\Http\Livewire\Plugins;

trait WatchLanguageChange
{
    public string $locale;

    public function mountWatchLanguageChange()
    {
        $this->locale = app()->getLocale();
    }
}
