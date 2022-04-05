<?php

namespace Modules\Aoe2Notebook\Http\Livewire\Unit;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Aoe2Notebook\Enums\ExpansionEnums;
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

    protected $rules = [
        'unit.name' => 'required|string|max:100|unique:aoe2notebook_units,name',
        'unit.expansion' => 'string|max:100',
        'unit.description' => 'string|max:255',
        'unit.age' => 'string|max:50',
        'unit.training_time' => 'nullable|numeric',
        'unit.hit_points' => 'nullable|numeric',
        'unit.attack' => 'nullable|numeric',
        'unit.rate_of_fire' => 'nullable|numeric',
        'unit.frame_delay' => 'nullable|numeric',
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
        'photo' => 'image|max:2048',
    ];

    public function mount(ExpansionEnums $expansionEnums)
    {
        $this->unit = new Unit;
        $this->expansions = $expansionEnums->labels();
    }

    public function save()
    {
        $this->validate();
        $this->unit->save();
        if ($this->photo) {
            $this->unit->addMedia($this->photo)->toMediaCollection();
        }
        $unit = $this->unit;
        $this->unit = new Unit;
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
        $this->dispatchBrowserEvent('success', ['message' => __('The unit has been created successfully.')]);
    }
}
