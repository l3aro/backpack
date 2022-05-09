<?php

namespace Modules\Aoe2Notebook\Http\Livewire\Civilization;

use Livewire\Component;
use Livewire\WithFileUploads;
use MichaelRubel\LoopFunctions\Traits\LoopFunctions;
use Modules\Aoe2Notebook\Enums\ExpansionEnum;
use Modules\Aoe2Notebook\Http\Requests\EditCivilizationRequest;
use Modules\Aoe2Notebook\Models\Civilization;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;

class Edit extends Component
{
    use LoadLayoutView;
    use LoopFunctions;
    use WithFileUploads;

    protected $viewPath = 'aoe2notebook::livewire.civilization.edit';
    public $photo;
    public $civilization;

    protected function rules(): array
    {
        return EditCivilizationRequest::baseRules($this->civilization);
    }

    public function mount(Civilization $civilization)
    {
        $this->civilization = $civilization;
        $this->propertiesFrom($civilization);
        $this->expansion = $this->expansion?->value;
    }

    public function save(): Civilization
    {
        $validated = $this->validate();
        $this->civilization->fill($validated);
        $this->civilization->save();

        if ($this->photo) {
            $this->civilization->addMedia($this->photo)->toMediaCollection();
        }

        $this->photo = null;
        return $this->civilization;
    }

    public function saveAndShow()
    {
        $this->save();
        return redirect()->route('admin.aoe2notebook.civilizations.show', $this->civilization->id);
    }

    public function saveAndContinue()
    {
        $this->save();
        $this->dispatchBrowserEvent('success', ['message' => __('The civilization has been updated successfully.')]);
    }

    public function getExpansionEnumLabelsProperty()
    {
        return ExpansionEnum::labels();
    }
}
