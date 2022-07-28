<?php

namespace Modules\Work\Http\Livewire;

use Livewire\Component;
use Modules\Core\Http\Livewire\Plugins\CanDestroyRecord;
use Modules\Core\Http\Livewire\Plugins\CanReorderRecord;
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
    use CanReorderRecord;
    use WatchLanguageChange;
    use LoopFunctions;

    protected $viewPath = 'work::livewire.project-category';

    protected $listeners = ['languageSwitched'];

    public bool $showForm = false;

    public ?ModelsProjectCategory $state;

    protected $rules = [
        'title' => 'required',
        'slug' => 'required',
    ];

    public function languageSwitched()
    {
        $this->fetchLocale();
    }

    public function hydrate()
    {
        $this->applyLocale();
    }

    public function updatedTitle($value)
    {
        $this->slug = str($value)->slug()->toString();
    }

    public function mount()
    {
        $this->fetchLocale();
        $this->state = app($this->getModel());
        $this->propertiesFrom($this->state);
    }

    public function add()
    {
        $this->state = app($this->getModel());
        $this->propertiesFrom($this->state);
        $this->showForm = true;
    }

    public function edit($categoryId)
    {
        $this->state = app($this->getModel())->find($categoryId);
        $this->propertiesFrom($this->state);
        $this->showForm = true;
    }

    public function save()
    {
        $validated = $this->validate();
        $this->state->fill($validated);
        $this->state->save();
        $this->showForm = false;
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
