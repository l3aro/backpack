<?php

namespace Modules\Core\Http\Livewire\Admin\Setting;

use Livewire\Component;
use Modules\Core\Http\Livewire\Plugins\LoadAdminView;
use Modules\Core\Models\Setting;
use Illuminate\Support\Str;

class General extends Component
{
    use LoadAdminView;

    public $viewPath = 'core::livewire.admin.setting.general';
    public $setting = [];

    protected $rules = [
        'setting.site_name' => 'required',
        'setting.site_description' => '',
        'setting.site_keywords' => '',
        'setting.site_email' => '',
        'setting.site_phone' => '',
        'setting.site_address' => '',
        'setting.site_map' => '',
    ];

    public function mount()
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
