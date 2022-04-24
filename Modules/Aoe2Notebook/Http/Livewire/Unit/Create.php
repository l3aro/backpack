<?php

namespace Modules\Aoe2Notebook\Http\Livewire\Unit;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Aoe2Notebook\Enums\AgeEnums;
use Modules\Aoe2Notebook\Enums\ExpansionEnums;
use Modules\Aoe2Notebook\Enums\ResourceEnums;
use Modules\Aoe2Notebook\Enums\UnitTypeEnums;
use Modules\Aoe2Notebook\Models\Unit;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;

class Create extends Component
{
    use LoadLayoutView;
    use WithFileUploads;

    protected $viewPath = 'aoe2notebook::livewire.unit.create';
    public Unit $unit;
    public $photo;
    public $expansions = [];
    public $ages = [];
    public $unitTypes = [];
    public $resources = [];
    public $trainingCosts;
    public $upgradeCosts;

    protected $rules = [
        'unit.name' => 'required|string|max:100|unique:aoe2notebook_units,name',
        'unit.expansion' => 'nullable|string|max:100',
        'unit.type' => 'nullable|array|max:100',
        'unit.civilization' => 'nullable|string|max:100',
        'unit.description' => 'nullable|string|max:255',
        'unit.age' => 'nullable|string|max:50',
        'unit.training_time' => 'nullable|numeric',
        'unit.training_cost' => 'nullable|array',
        'unit.hit_points' => 'nullable|numeric',
        'unit.attack' => 'nullable|numeric',
        'unit.rate_of_fire' => 'nullable|numeric',
        'unit.attack_delay' => 'nullable|numeric',
        'unit.frame_delay' => 'nullable|numeric',
        'unit.minimum_range' => 'nullable|numeric',
        'unit.range' => 'nullable|numeric',
        'unit.accuracy' => 'nullable|numeric',
        'unit.projectile_speed' => 'nullable|numeric',
        'unit.melee_armor' => 'nullable|numeric',
        'unit.pierce_armor' => 'nullable|numeric',
        'unit.speed' => 'nullable|numeric',
        'unit.line_of_sight' => 'nullable|numeric',
        'unit.upgrade_from_id' => 'nullable|numeric',
        'unit.upgrade_to_id' => 'nullable|numeric',
        'unit.upgrade_time' => 'nullable|numeric',
        'photo' => 'nullable|image|max:2048',
        'trainingCosts' => 'nullable|array',
        'trainingCosts.*' => 'nullable|numeric',
        'upgradeCosts' => 'nullable|array',
        'upgradeCosts.*' => 'nullable|numeric',
    ];

    public function mount(
        ExpansionEnums $expansionEnums,
        UnitTypeEnums $unitTypeEnums,
        ResourceEnums $resourceEnums,
        AgeEnums $ageEnums
    ) {
        $this->resetState();
        $this->expansions = $expansionEnums->labels();
        $this->ages = $ageEnums->labels();
        $this->unitTypes = $unitTypeEnums->labels();
        $this->resources = $resourceEnums->labels();
    }

    private function resetState()
    {
        $this->unit = new Unit;
        $this->photo = null;
        $this->trainingCosts = [];
        $this->upgradeCosts = [];
    }

    public function save()
    {
        $this->validate();
        $this->unit->forceFill([
            'training_cost' => $this->trainingCosts,
            'upgrade_cost' => $this->upgradeCosts,
        ]);
        $this->unit->save();
        if ($this->photo) {
            $this->unit->addMedia($this->photo)->toMediaCollection();
        }
        $unit = $this->unit;
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
}
