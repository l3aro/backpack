<?php

namespace Modules\Blog\Http\Livewire\Admin\Blog;

use Livewire\Component;
use Modules\Blog\Models\Blog;
use Modules\Core\Http\Livewire\Plugins\CanDestroyRecord;
use Modules\Core\Http\Livewire\Plugins\HasDataTable;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;

class Index extends Component
{
    use HasDataTable;
    use LoadLayoutView;
    use CanDestroyRecord;

    protected $viewPath = 'blog::livewire.admin.blog.index';

    protected function getModel()
    {
        return Blog::class;
    }
}
