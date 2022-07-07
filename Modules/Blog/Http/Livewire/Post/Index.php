<?php

namespace Modules\Blog\Http\Livewire\Post;

use Livewire\Component;
use Modules\Blog\Models\Category;
use Modules\Blog\Models\Post;
use Modules\Core\Http\Livewire\Plugins\CanDestroyRecord;
use Modules\Core\Http\Livewire\Plugins\CanReorderRecord;
use Modules\Core\Http\Livewire\Plugins\HasDataTable;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Modules\Core\Http\Livewire\Plugins\WatchLanguageChange;
use Spatie\Tags\Tag;

class Index extends Component
{
    use HasDataTable;
    use LoadLayoutView;
    use CanDestroyRecord;
    use CanReorderRecord;
    use WatchLanguageChange;

    protected $viewPath = 'blog::livewire.post.index';

    protected $recordListName = 'posts';

    public $postCategories;

    public $postTags;

    protected $listeners = ['languageSwitched'];

    public function languageSwitched()
    {
        $this->fetchLocale();
    }

    public function mount()
    {
        $this->fetchLocale();
        $this->postCategories = Category::all(['id', 'title']);
        $this->postTags = Tag::getWithType($this->getModel());
    }

    protected function getModel()
    {
        return Post::class;
    }

    public function viewData(): array
    {
        return [
            'posts' => $this->queryBuilder()
                ->filter()
                ->with('categories:id,title')
                ->paginate($this->perPage),
        ];
    }

    protected function beforeDestroyRecord()
    {
        app($this->getModel())->find($this->confirmingId)->categories()->detach();
    }
}
