<?php

namespace Modules\Blog\Http\Livewire\PostCategory;

use Livewire\Component;
use Modules\Blog\Models\Category;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;

class Show extends Component
{
    use LoadLayoutView;

    protected $viewPath = 'blog::livewire.post-category.show';
    public Category $postCategory;

    public function mount(Category $postCategory)
    {
        $this->postCategory = $postCategory;
        $this->postCategory->loadCount('posts');
    }
}
