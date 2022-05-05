<?php

namespace Modules\Aoe2Notebook\Http\Livewire\Civilization;

use Livewire\Component;
use Livewire\WithFileUploads;
use MichaelRubel\LoopFunctions\Traits\LoopFunctions;
use Modules\Aoe2Notebook\Enums\ExpansionEnum;
use Modules\Aoe2Notebook\Http\Requests\CreateCivilizationRequest;
use Modules\Aoe2Notebook\Models\Civilization;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;

class Create extends Component
{
    use LoadLayoutView;
    use WithFileUploads;
    use LoopFunctions;

    protected $viewPath = 'aoe2notebook::livewire.civilization.create';
    // public Civilization $civilization;
    public $photo;

    // protected $rules = [
    //     'civilization.name' => 'required|string|max:100|unique:aoe2notebook_civilizations,name',
    //     'civilization.expansion' => 'string|max:100',
    //     'civilization.army_type' => 'string|max:100',
    //     'civilization.team_bonus' => 'string|max:255',
    //     'photo' => 'nullable|image|max:2048',
    // ];

    public function mount()
    {
        // $this->civilization = new Civilization;
        $civilization = new Civilization;
        $this->propertiesFrom($civilization);
    }

    public function save()
    {
        // $this->validate();
        // dd(app(CreateCivilizationRequest::class)->rules());
        $this->validateOnly('civilization', app(CreateCivilizationRequest::class)->rules());
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

    public function getExpansionEnumLabelsProperty()
    {
        return ExpansionEnum::labels();
    }
}
