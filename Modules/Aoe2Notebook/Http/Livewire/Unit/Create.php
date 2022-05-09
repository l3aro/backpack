<?php

namespace Modules\Aoe2Notebook\Http\Livewire\Unit;

use Livewire\Component;
use Livewire\WithFileUploads;
use MichaelRubel\LoopFunctions\Traits\LoopFunctions;
use Modules\Aoe2Notebook\Enums\AgeEnum;
use Modules\Aoe2Notebook\Enums\ExpansionEnum;
use Modules\Aoe2Notebook\Enums\ResourceEnum;
use Modules\Aoe2Notebook\Enums\UnitTypeEnum;
use Modules\Aoe2Notebook\Http\Requests\CreateUnitRequest;
use Modules\Aoe2Notebook\Models\Unit;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;

class Create extends Component
{
    use LoadLayoutView;
    use WithFileUploads;
    use LoopFunctions;

    protected $viewPath = 'aoe2notebook::livewire.unit.create';
    public Unit $unit;
    public $photo;
    public $trainingCosts;
    public $upgradeCosts;

    protected function rules(): array
    {
        return CreateUnitRequest::baseRules();
    }

    public function mount()
    {
        $this->resetState();
    }

    private function resetState()
    {
        $unit = new Unit();
        $this->propertiesFrom($unit);
        $this->fill($unit);
        $this->expansion = ($this->expansion instanceof ExpansionEnum)
            ? $this->expansion->value
            : $this->expansion;
        $this->age = ($this->age instanceof AgeEnum)
            ? $this->age->value
            : $this->age;
        $this->photo = null;
        $this->trainingCosts = [];
        $this->upgradeCosts = [];
    }

    public function save()
    {
        $validated = $this->validate();
        $unit = new Unit();
        $unit->fill(array_merge($validated, [
            'training_cost' => $this->trainingCosts,
            'upgrade_cost' => $this->upgradeCosts,
        ]));
        $unit->save();
        if ($this->photo) {
            $unit->addMedia($this->photo)->toMediaCollection();
        }
        $this->resetState();
        return $unit;
    }

    public function saveAndShow()
    {
        $unit = $this->save();
        return redirect()->route('admin.aoe2notebook.units.show', $unit->id);
    }

    public function saveAndContinue()
    {
        $this->save();
        $this->dispatchBrowserEvent('success', [
            'message' => __('The unit has been created successfully.')
        ]);
    }

    public function getAgeEnumLabelsProperty()
    {
        return AgeEnum::labels();
    }

    public function getExpansionEnumLabelsProperty()
    {
        return ExpansionEnum::labels();
    }

    public function getUnitTypeEnumLabelsProperty()
    {
        return UnitTypeEnum::labels();
    }

    public function getResourceEnumLabelsProperty()
    {
        return ResourceEnum::labels();
    }
}
