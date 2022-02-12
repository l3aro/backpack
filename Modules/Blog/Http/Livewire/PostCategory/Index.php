<?php

namespace Modules\Blog\Http\Livewire\PostCategory;

use Livewire\Component;
use Modules\Blog\Models\Category;
use Modules\Core\Http\Livewire\Plugins\CanDestroyRecord;
use Modules\Core\Http\Livewire\Plugins\CanReorderRecord;
use Modules\Core\Http\Livewire\Plugins\HasDataTable;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;

/**
 * @property \Illuminate\Pagination\LengthAwarePaginator $postCategories
 */
class Index extends Component
{
    use LoadLayoutView;
    use HasDataTable;
    use CanDestroyRecord;
    use CanReorderRecord;

    protected $viewPath = 'blog::livewire.post-category.index';
    protected $recordListName = 'postCategories';

    public function getPostCategoriesProperty()
    {
        return $this->queryBuilder()
            ->filter()
            ->withCount('posts')
            ->paginate($this->perPage);
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
