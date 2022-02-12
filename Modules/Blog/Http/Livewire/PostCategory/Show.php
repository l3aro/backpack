<?php

namespace Modules\Blog\Http\Livewire\PostCategory;

use Livewire\Component;
use Modules\Blog\Models\PostCategory;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;

class Show extends Component
{
    use LoadLayoutView;

    protected $viewPath = 'blog::livewire.post-category.show';
    public PostCategory $postCategory;

    public function mount(PostCategory $postCategory)
    {
        $this->postCategory = $postCategory;
        $this->postCategory->loadCount('posts');
    }
}
