<?php

namespace Modules\Aoe2Notebook\Http\Livewire\Civilization;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Aoe2Notebook\Enums\ExpansionEnums;
use Modules\Aoe2Notebook\Models\Civilization;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;

class Create extends Component
{
    use LoadLayoutView;
    use WithFileUploads;

    protected $viewPath = 'aoe2notebook::livewire.civilization.create';
    public Civilization $civilization;
    public $photo;
    public $expansions = [];

    protected $rules = [
        'civilization.name' => 'required|string|max:100|unique:aoe2notebook_civilizations,name',
        'civilization.expansion' => 'string|max:100',
        'civilization.army_type' => 'string|max:100',
        'civilization.team_bonus' => 'string|max:255',
        'photo' => 'image|max:2048',
    ];

    public function mount(ExpansionEnums $expansionEnums)
    {
        $this->civilization = new Civilization;
        $this->expansions = $expansionEnums->labels();
    }

    public function save()
    {
        $this->validate();
        $this->civilization->save();
        if ($this->photo) {
            $this->civilization->addMedia($this->photo)->toMediaCollection();
        }
        $civilization = $this->civilization;
        $this->civilization = new Civilization;
        return $civilization;
    }

    public function saveAndShow()
    {
        $civilization = $this->save();
        return redirect()->route('admin.aoe2notebook.civilizations.show', $civilization->id);
    }

    public function saveAndContinue()
    {
        $this->save();
        $this->dispatchBrowserEvent('success', ['message' => __('The civilization has been created successfully.')]);
    }
}
