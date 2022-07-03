<?php

namespace Modules\Blog\Http\Livewire\PostCategory;

use Livewire\Component;
use Modules\Blog\Models\Category;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Modules\Core\Http\Livewire\Plugins\WatchLanguageChange;

class Show extends Component
{
    use LoadLayoutView;
    use WatchLanguageChange;

    protected $viewPath = 'blog::livewire.post-category.show';
    public Category $postCategory;
    protected $listeners = ['languageSwitched'];

    public function languageSwitched()
    {
        $this->fetchLocale();
        $this->postCategory->refresh();
    }

    public function mount(Category $postCategory)
    {
        $this->fetchLocale();
        $this->postCategory = $postCategory;
        $this->postCategory->loadCount('posts');
    }
}
