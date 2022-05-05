<?php

namespace Modules\Aoe2Notebook\Http\Livewire\Civilization;

use Livewire\Component;
use Modules\Aoe2Notebook\Models\Civilization;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;

class Show extends Component
{
    use LoadLayoutView;

    protected $viewPath = 'aoe2notebook::livewire.civilization.show';
    public Civilization $civilization;

    public function mount(Civilization $civilization)
    {
        $this->civilization = $civilization;
    }
}
