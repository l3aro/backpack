<?php

namespace Modules\Portfolio\Http\Livewire;

use Livewire\Component;
use Modules\Blog\Models\Post;
use Modules\Blog\Models\PostCategory;
use Modules\Portfolio\Http\Livewire\Plugins\LoadWebLayout;
use Modules\Core\Http\Livewire\Plugins\HasDataTable;
use Spatie\Tags\Tag;

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
            'categories' => PostCategory::published()
                ->withCount('blogs')
                ->get(['id', 'title', 'slug']),
            'tags' => Tag::getWithType($this->getModel()),
        ];
    }

    protected function getModel()
    {
        return Post::class;
    }
}
