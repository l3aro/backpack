<?php

namespace Modules\Blog\Http\Livewire\Admin\Blog;

use Livewire\Component;
use Modules\Blog\Models\Blog;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;

class Show extends Component
{
    use LoadLayoutView;

    protected $viewPath = 'blog::livewire.admin.blog.show';
    public Blog $blog;

    public function mount(Blog $blog)
    {
        $this->blog = $blog;
    }
}
