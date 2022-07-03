<?php

namespace Modules\Blog\Http\Livewire\PostCategory;

use Livewire\Component;
use Modules\Blog\Models\Category;
use Modules\Core\Http\Livewire\Plugins\CanDestroyRecord;
use Modules\Core\Http\Livewire\Plugins\CanReorderRecord;
use Modules\Core\Http\Livewire\Plugins\HasDataTable;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Modules\Core\Http\Livewire\Plugins\WatchLanguageChange;

class Index extends Component
{
    use LoadLayoutView;
    use HasDataTable;
    use CanDestroyRecord;
    use CanReorderRecord;
    use WatchLanguageChange;

    protected $viewPath = 'blog::livewire.post-category.index';
    protected $recordListName = 'postCategories';
    protected $listeners = ['languageSwitched'];

    public function mount()
    {
        $this->fetchLocale();
    }

    public function languageSwitched()
    {
        $this->fetchLocale();
    }

    public function viewData(): array
    {
        return [
            'postCategories' => $this->queryBuilder()
                ->filter()
                ->withCount('posts')
                ->paginate($this->perPage),
        ];
    }

    protected function getModel()
    {
        return Category::class;
    }

    protected function beforeDestroyRecord()
    {
        app($this->getModel())->find($this->confirmingId)->posts()->detach();
    }
}
