<?php

namespace Modules\Core\Http\Livewire\Setting;

use Livewire\Component;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Modules\Core\Models\Setting;
use Illuminate\Support\Str;

class About extends Component
{
    use LoadLayoutView;

    protected $viewPath = 'core::livewire.setting.about';
    public $setting = [];
    public $image;
    protected $rules = [
        'setting.about_content' => 'required',
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

        $this->setting['about_content'] ??= '';
    }

    public function save()
    {
        $this->validate($this->rules);

        if ($this->image) {
            $this->setting['about_image'] = Setting::uploadImage($this->image);
        }

        foreach ($this->setting as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        $this->dispatchBrowserEvent('success', ['message' => __('Setting saved successfully')]);
    }
}
