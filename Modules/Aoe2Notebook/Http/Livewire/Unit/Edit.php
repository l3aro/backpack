<?php

namespace Modules\Aoe2Notebook\Http\Livewire\Unit;

use Livewire\Component;
use Modules\Aoe2Notebook\Models\Unit;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;

class Edit extends Component
{
    use LoadLayoutView;

    protected $viewPath = 'aoe2notebook::livewire.unit.edit';
    public Unit $unit;

    protected function rules()
    {
        return [
            'unit.name' => 'required|string|max:100|unique:aoe2notebook_units,name,' . $this->unit->id,
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
            'photo' => 'nullable|image|max:2048',
        ];
    }

    public function mount(Unit $unit)
    {
        $this->unit = $unit;
    }

    public function save()
    {
        $this->validate();
        $this->unit->save();
        if ($this->photo) {
            $this->unit->addMedia($this->photo)->toMediaCollection();
        }
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
        $this->dispatchBrowserEvent('success', ['message' => __('The unit has been updated successfully.')]);
    }
}
