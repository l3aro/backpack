<?php

namespace Modules\Work\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Core\Http\Livewire\Plugins\CanDestroyRecord;
use Modules\Core\Http\Livewire\Plugins\CanReorderRecord;
use Modules\Core\Http\Livewire\Plugins\HasDataTable;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Modules\Core\Http\Livewire\Plugins\LoopFunctions;
use Modules\Core\Http\Livewire\Plugins\WatchLanguageChange;
use Modules\Work\Models\Project as ModelsProject;

class Project extends Component
{
    use LoadLayoutView;
    use HasDataTable;
    use CanDestroyRecord;
    use CanReorderRecord;
    use WatchLanguageChange;
    use LoopFunctions;
    use WithFileUploads;

    protected $viewPath = 'work::livewire.project';

    protected $listeners = ['languageSwitched'];

    public bool $showForm = false;

    public ?ModelsProject $state;

    public $photo;

    public $categories;

    protected $rules = [
        'title' => 'required',
        'slug' => 'required',
        'description' => 'required',
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
        $this->photo = null;
        $this->showForm = true;
    }

    public function edit($categoryId)
    {
        $this->state = app($this->getModel())->find($categoryId);
        $this->propertiesFrom($this->state);
        $this->photo = null;
        $this->showForm = true;
    }

    public function save()
    {
        $validated = $this->validate();
        $this->state->fill($validated);
        $this->state->save();
        if ($this->photo) {
            $this->state->addMedia($this->photo)->toMediaCollection();
        }
        $this->resetState();
        $this->showForm = false;
    }

    protected function getModel()
    {
        return ModelsProject::class;
    }

    protected function resetState()
    {
        $project = new ModelsProject();
        $this->propertiesFrom($project);
        $this->fill($project);
        $this->photo = null;
    }

    public function viewData(): array
    {
        return [
            'records' => $this->queryBuilder()
                ->filter()
                ->paginate($this->perPage),
        ];
    }
}
