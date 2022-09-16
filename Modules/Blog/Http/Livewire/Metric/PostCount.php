<?php

namespace Modules\Blog\Http\Livewire\Metric;

use Livewire\Component;
use Modules\Blog\Models\Post;

class PostCount extends Component
{
    public function render()
    {
        return view('blog::livewire.metric.post-count', [
            'postCount' => Post::count(),
            'publishedPostCount' => Post::published()->count(),
        ]);
    }
}
