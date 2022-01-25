<?php

namespace Modules\Blog\Http\Livewire\Admin\BlogCategory;

use Livewire\Component;
use Modules\Blog\Models\BlogCategory;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;

class Show extends Component
{
    use LoadLayoutView;

    protected $viewPath = 'blog::livewire.admin.blog-category.show';
    public BlogCategory $blogCategory;

    public function mount(BlogCategory $blogCategory)
    {
        $this->blogCategory = $blogCategory;
        $this->blogCategory->loadCount('blogs');
    }
}
