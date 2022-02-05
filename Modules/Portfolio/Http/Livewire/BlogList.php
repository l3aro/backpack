<?php

namespace Modules\Portfolio\Http\Livewire;

use Livewire\Component;
use Modules\Blog\Models\Blog;
use Modules\Blog\Models\BlogCategory;
use Modules\Portfolio\Http\Livewire\Plugins\LoadWebLayout;
use Modules\Core\Http\Livewire\Plugins\HasDataTable;

class BlogList extends Component
{
    use LoadWebLayout;
    use HasDataTable;

    protected $viewPath = 'portfolio::livewire.blog-list';

    public function viewData()
    {
        return [
            'posts' => $this->queryBuilder()
                ->filter()
                ->published()
                ->with(['categories' => fn ($query) => $query->published()])
                ->simplePaginate($this->perPage),
            'categories' => BlogCategory::published()
                ->withCount('blogs')
                ->get(['id', 'title', 'slug']),
        ];
    }

    protected function getModel()
    {
        return Blog::class;
    }
}
