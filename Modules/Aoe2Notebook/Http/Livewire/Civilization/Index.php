<?php

namespace Modules\Aoe2Notebook\Http\Livewire\Civilization;

use Livewire\Component;
use Modules\Aoe2Notebook\Models\Civilization;
use Modules\Core\Http\Livewire\Plugins\CanDestroyRecord;
use Modules\Core\Http\Livewire\Plugins\HasDataTable;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;

class Index extends Component
{
    use LoadLayoutView;
    use HasDataTable;
    use CanDestroyRecord;

    protected $viewPath = 'aoe2notebook::livewire.civilization.index';

    public function viewData(): array
    {
        return [
            'civilizations' => $this->queryBuilder()
                ->filter()
                ->paginate($this->perPage),
        ];
    }

    protected function getModel()
    {
        return Civilization::class;
    }
}
