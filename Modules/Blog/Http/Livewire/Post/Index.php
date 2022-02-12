<?php

namespace Modules\Blog\Http\Livewire\Post;

use Livewire\Component;
use Modules\Blog\Models\Post;
use Modules\Blog\Models\PostCategory;
use Modules\Core\Http\Livewire\Plugins\CanDestroyRecord;
use Modules\Core\Http\Livewire\Plugins\CanReorderRecord;
use Modules\Core\Http\Livewire\Plugins\HasDataTable;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Spatie\Tags\Tag;

/**
 * @property \Illuminate\Pagination\LengthAwarePaginator $posts
 */
class Index extends Component
{
    use HasDataTable;
    use LoadLayoutView;
    use CanDestroyRecord;
    use CanReorderRecord;

    protected $viewPath = 'blog::livewire.post.index';
    protected $recordListName = 'posts';
    public $postCategories;
    public $postTags;

    public function mount()
    {
        $this->postCategories = PostCategory::all(['id', 'title']);
        $this->postTags = Tag::getWithType($this->getModel());
    }

    protected function getModel()
    {
        return Post::class;
    }

    public function getPostsProperty()
    {
        return $this->queryBuilder()
            ->filter()
            ->with('categories:id,title')
            ->paginate($this->perPage);
    }

    protected function beforeDestroyRecord()
    {
        app($this->getModel())->find($this->confirmingId)->categories()->detach();
    }
}
