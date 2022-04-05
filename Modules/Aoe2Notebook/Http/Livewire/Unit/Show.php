<?php

namespace Modules\Aoe2Notebook\Http\Livewire\Unit;

use Livewire\Component;
use Modules\Aoe2Notebook\Models\Unit;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;

class Show extends Component
{
    use LoadLayoutView;

    protected $viewPath = 'aoe2notebook::livewire.unit.show';
    public Unit $unit;

    public function mount(Unit $unit)
    {
        $this->unit = $unit;
    }
}
