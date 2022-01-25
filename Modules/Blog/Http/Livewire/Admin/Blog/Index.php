<?php

namespace Modules\Blog\Http\Livewire\Admin\Blog;

use Livewire\Component;
use Modules\Blog\Models\Blog;
use Modules\Blog\Models\BlogCategory;
use Modules\Core\Http\Livewire\Plugins\CanDestroyRecord;
use Modules\Core\Http\Livewire\Plugins\CanReorderRecord;
use Modules\Core\Http\Livewire\Plugins\HasDataTable;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Illuminate\Support\Str;

/**
 * @property \Illuminate\Pagination\LengthAwarePaginator $blogs
 */
class Index extends Component
{
    use HasDataTable;
    use LoadLayoutView;
    use CanDestroyRecord;
    use CanReorderRecord;

    protected $viewPath = 'blog::livewire.admin.blog.index';
    protected $recordListName = 'blogs';
    public $blogCategories;

    public function mount()
    {
        $this->blogCategories = BlogCategory::all(['id', 'title']);
    }

    protected function getModel()
    {
        return Blog::class;
    }

    public function getBlogsProperty()
    {
        return $this->queryBuilder()
            ->filter()
            ->with('categories:id,title')
            ->paginate($this->perPage);
    }
}
