<?php

namespace Modules\Portfolio\Http\Livewire;

use Livewire\Component;
use Modules\Blog\Models\Post;
use Modules\Portfolio\Http\Livewire\Plugins\LoadWebLayout;

class BlogDetail extends Component
{
    use LoadWebLayout;

    protected $viewPath = 'portfolio::livewire.blog-detail';

    public Post $post;

    public function mount(string $postSlug)
    {
        $this->post = Post::where('slug', 'like', "%$postSlug%")->firstOrFail();
        dd($this->post);
    }
}
