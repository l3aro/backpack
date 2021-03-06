<?php

namespace Modules\Aoe2Notebook\Http\Livewire\Unit;

use Livewire\Component;
use Livewire\WithFileUploads;
use MichaelRubel\LoopFunctions\Traits\LoopFunctions;
use Modules\Aoe2Notebook\Enums\AgeEnum;
use Modules\Aoe2Notebook\Enums\ExpansionEnum;
use Modules\Aoe2Notebook\Enums\ResourceEnum;
use Modules\Aoe2Notebook\Enums\UnitTypeEnum;
use Modules\Aoe2Notebook\Http\Requests\EditUnitRequest;
use Modules\Aoe2Notebook\Models\Unit;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;

class Edit extends Component
{
    use LoadLayoutView;
    use WithFileUploads;
    use LoopFunctions;

    protected $viewPath = 'aoe2notebook::livewire.unit.edit';

    public Unit $unit;

    public $photo;

    public $trainingCosts;

    public $upgradeCosts;

    protected function rules()
    {
        return EditUnitRequest::baseRules($this->unit);
    }

    public function mount(Unit $unit)
    {
        $this->unit = $unit;
        $this->propertiesFrom($unit);
        $this->expansion = ($this->expansion instanceof ExpansionEnum)
            ? $this->expansion->value
            : $this->expansion;
        $this->age = ($this->age instanceof AgeEnum)
            ? $this->age->value
            : $this->age;
        $this->trainingCosts = $unit->training_cost;
        $this->upgradeCosts = $unit->upgrade_cost;
    }

    public function save()
    {
        $validated = $this->validate();
        $this->unit->fill(array_merge($validated, [
            'training_cost' => $this->trainingCosts,
            'upgrade_cost' => $this->upgradeCosts,
        ]));
        $this->unit->save();
        if ($this->photo) {
            $this->unit->addMedia($this->photo)->toMediaCollection();
        }
        $this->photo = null;

        return $this->unit;
    }

    public function saveAndShow()
    {
        $unit = $this->save();

        return redirect()->route('aoe2notebook.units.show', $unit->id);
    }

    public function saveAndContinue()
    {
        $this->save();
        $this->dispatchBrowserEvent('success', [
            'message' => __('The unit has been updated successfully.'),
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
