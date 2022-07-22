<?php

namespace Modules\Work\Http\Livewire;

use Livewire\Component;
use Modules\Core\Http\Livewire\Plugins\CanDestroyRecord;
use Modules\Core\Http\Livewire\Plugins\HasDataTable;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Modules\Core\Http\Livewire\Plugins\LoopFunctions;
use Modules\Core\Http\Livewire\Plugins\WatchLanguageChange;
use Modules\Work\Models\ProjectCategory as ModelsProjectCategory;

class ProjectCategory extends Component
{
    use LoadLayoutView;
    use HasDataTable;
    use CanDestroyRecord;
    use WatchLanguageChange;
    use LoopFunctions;

    protected $viewPath = 'work::livewire.project-category';

    protected $listeners = ['languageSwitched'];

    public bool $showForm = false;

    public ?ModelsProjectCategory $projectCategory;

    public function languageSwitched()
    {
        $this->fetchLocale();
    }

    public function hydrate()
    {
        $this->applyLocale();
    }

    public function mount()
    {
        $this->fetchLocale();
        $this->projectCategory = new ModelsProjectCategory;
        $this->propertiesFrom($this->projectCategory);
    }

    protected function getModel()
    {
        return ModelsProjectCategory::class;
    }

    public function viewData(): array
    {
        return [
            'records' => $this->queryBuilder()
                ->filter()
                ->withCount('projects')
                ->paginate($this->perPage),
        ];
    }
}
