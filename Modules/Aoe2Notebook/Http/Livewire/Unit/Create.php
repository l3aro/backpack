<?php

namespace Modules\Aoe2Notebook\Http\Livewire\Unit;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Aoe2Notebook\Models\Unit;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;

class Create extends Component
{
    use LoadLayoutView;
    use WithFileUploads;

    protected $viewPath = 'aoe2notebook::livewire.unit.create';
    public Unit $unit;
    public $photo;

    protected $rules = [
        'unit.name' => 'required|string|max:100|unique:aoe2notebook_units,name',
        'unit.expansion' => 'string|max:100',
        'unit.description' => 'string|max:255',
        'unit.age' => 'string|max:50',
    ];
}
