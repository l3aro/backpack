<?php

namespace Modules\Core\Http\Livewire\Admin\Setting;

use Livewire\Component;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Modules\Core\Models\Setting;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Modules\Blog\Models\Blog;

class Home extends Component
{
    use LoadLayoutView;
    use WithFileUploads;

    protected $viewPath = 'core::livewire.admin.setting.home';
    public $setting = [];
    public $jumbotronImage;
    public $introImage;
    public $section1Image;
    public $section2Image;
    public $aboutImage;
    public $projects;

    protected $rules = [
        'setting.home_jumbotron_heading' => 'required',
        'setting.home_jumbotron_paragraph' => '',
        'setting.home_jumbotron_image' => '',
        'setting.home_jumbotron_action_text_1' => '',
        'setting.home_jumbotron_action_link_1' => '',
        'setting.home_jumbotron_action_text_2' => '',
        'setting.home_jumbotron_action_link_2' => '',
        'setting.home_intro_heading' => '',
        'setting.home_intro_paragraph' => '',
        'setting.home_intro_link' => '',
        'setting.home_intro_image' => '',
        'setting.home_section_1_image' => '',
        'setting.home_section_1_heading' => '',
        'setting.home_section_1_paragraph' => '',
        'setting.home_project_1' => '',
        'setting.home_project_2' => '',
        'setting.home_project_3' => '',
        'setting.home_about_heading' => '',
        'setting.home_about_paragraph' => '',
        'setting.home_about_link' => '',
        'setting.home_about_image' => '',
        'setting.home_section_2_image' => '',
        'setting.home_section_2_heading' => '',
        'setting.home_section_2_paragraph' => '',
        'setting.home_section_2_link' => '',
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

        $this->projects = Blog::query()
            ->get(['id', 'name']);

        $this->setting['home_project_1'] ??= '';
        $this->setting['home_project_2'] ??= '';
        $this->setting['home_project_3'] ??= '';
    }

    public function save()
    {
        $this->validate($this->rules);

        if ($this->jumbotronImage) {
            $this->setting['home_jumbotron_image'] = Setting::uploadImage($this->jumbotronImage);
        }

        if ($this->introImage) {
            $this->setting['home_intro_image'] = Setting::uploadImage($this->introImage);
        }

        if ($this->section1Image) {
            $this->setting['home_section_1_image'] = Setting::uploadImage($this->section1Image);
        }

        if ($this->aboutImage) {
            $this->setting['home_about_image'] = Setting::uploadImage($this->aboutImage);
        }

        if ($this->section2Image) {
            $this->setting['home_section_2_image'] = Setting::uploadImage($this->section2Image);
        }

        foreach ($this->setting as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        $this->dispatchBrowserEvent('success', ['message' => __('Setting saved successfully')]);
    }
}
