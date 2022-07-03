<?php

namespace Modules\Blog\Http\Livewire\Post;

use Livewire\Component;
use Modules\Blog\Models\Post;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Modules\Core\Http\Livewire\Plugins\WatchLanguageChange;

class Show extends Component
{
    use LoadLayoutView;
    use WatchLanguageChange;

    protected $viewPath = 'blog::livewire.post.show';
    public Post $post;
    protected $listeners = ['languageSwitched'];

    public function languageSwitched()
    {
        $this->fetchLocale();
        $this->post->refresh();
    }

    public function mount(Post $post)
    {
        $this->post = $post;
    }
}
