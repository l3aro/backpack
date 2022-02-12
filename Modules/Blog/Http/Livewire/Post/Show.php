<?php

namespace Modules\Blog\Http\Livewire\Post;

use Livewire\Component;
use Modules\Blog\Models\Post;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;

class Show extends Component
{
    use LoadLayoutView;

    protected $viewPath = 'blog::livewire.post.show';
    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }
}
