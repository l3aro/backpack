<?php

namespace Modules\Blog\Http\Livewire\Admin\BlogCategory;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Modules\Blog\Models\BlogCategory;
use Modules\Core\Http\Livewire\Plugins\CanDestroyRecord;
use Modules\Core\Http\Livewire\Plugins\CanReorderRecord;
use Modules\Core\Http\Livewire\Plugins\HasDataTable;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;

/**
 * @property \Illuminate\Pagination\LengthAwarePaginator $blogCategories
 */
class Index extends Component
{
    use LoadLayoutView;
    use HasDataTable;
    use CanDestroyRecord;
    use CanReorderRecord;

    protected $viewPath = 'blog::livewire.admin.blog-category.index';
    protected $recordListName = 'blogCategories';

    public function getBlogCategoriesProperty()
    {
        return $this->queryBuilder()
            ->filter()
            ->withCount('blogs')
            ->paginate($this->perPage);
    }

    protected function getModel()
    {
        return BlogCategory::class;
    }
}
