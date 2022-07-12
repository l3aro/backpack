<?php

namespace Modules\Portfolio\Http\Livewire\Setting;

use Illuminate\Support\Str;
use Livewire\Component;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Modules\Core\Http\Livewire\Plugins\WatchLanguageChange;
use Modules\Core\Models\Setting;

class Portfolio extends Component
{
    use LoadLayoutView;
    use WatchLanguageChange;

    public $viewPath = 'portfolio::livewire.setting.portfolio';

    public $setting = [];

    protected $rules = [
        'setting.portfolio_greeting' => 'required',
        'setting.portfolio_intro' => 'required',
    ];

    protected $listeners = ['languageSwitched'];

    public function languageSwitched()
    {
        $this->fetchLocale();
        $this->resetState();
    }

    public function hydrate()
    {
        $this->applyLocale();
    }

    public function mount()
    {
        $this->resetState();
    }

    public function resetState()
    {
        $generalSetting = collect($this->rules)
            ->keys()
            ->map(fn (string $setting) => Str::replaceFirst('setting.', '', $setting))
            ->toArray();
        $this->setting = Setting::query()
            ->whereIn('key', $generalSetting)
            ->get(['key', 'value'])
            ->keyBy('key')
            ->map->getValue()
            ->toArray();
    }

    public function save()
    {
        $this->validate($this->rules);

        foreach ($this->setting as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        $this->dispatchBrowserEvent('success', ['message' => __('Setting saved successfully')]);
    }
}
