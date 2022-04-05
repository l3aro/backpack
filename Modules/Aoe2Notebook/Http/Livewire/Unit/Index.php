<?php

namespace Modules\Aoe2Notebook\Http\Livewire\Unit;

use Livewire\Component;
use Modules\Core\Http\Livewire\Plugins\CanDestroyRecord;
use Modules\Core\Http\Livewire\Plugins\HasDataTable;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;

class Index extends Component
{
    use LoadLayoutView;
    use HasDataTable;
    use CanDestroyRecord;
    
    protected $viewPath = 'aoe2notebook::livewire.unit.index';

    public function viewData(): array
    {
        return [
            'units' => $this->queryBuilder()
                ->filter()
                ->paginate($this->perPage),
        ];
    }

    protected function getModel()
    {
        return \Modules\Aoe2Notebook\Models\Unit::class;
    }
}
