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

    public $civilization;

    public $photo;

    protected function rules()
    {
        return CreateCivilizationRequest::baseRules();
    }

    public function mount()
    {
        $this->resetState();
    }

    protected function resetState()
    {
        $civilization = new Civilization();
        $this->propertiesFrom($civilization);
        $this->fill($civilization);
        if ($this->expansion instanceof ExpansionEnum) {
            $this->expansion = $this->expansion?->value;
        }
        $this->photo = null;
    }

    public function save(): Civilization
    {
        $validated = $this->validate();
        $state = new Civilization;
        $state->fill($validated);
        $state->save();

        if ($this->photo) {
            $state->addMedia($this->photo)->toMediaCollection();
        }
        $this->resetState();

        return $state;
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
