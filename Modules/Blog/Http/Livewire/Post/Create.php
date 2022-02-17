<?php

namespace Modules\Blog\Http\Livewire\Post;

use Livewire\Component;
use Modules\Blog\Models\Post;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Modules\Blog\Models\Category;

class Create extends Component
{
    use LoadLayoutView;
    use WithFileUploads;

    protected $viewPath = 'blog::livewire.post.create';
    public Post $post;
    public $postCategories;
    public $selectedCategories = [];
    public $photo;
    public $tags = [];

    protected $rules = [
        'post.title' => 'required|string|max:255',
        'post.description' => 'string',
        'post.content' => 'required|string',
        'post.slug' => 'required|string|max:255',
        'post.published_at' => 'nullable|date',
        'post.meta_title' => '',
        'post.meta_description' => '',
        'post.meta_keyword' => '',
        'selectedCategories' => 'required|array',
        'photo' => 'nullable|image',
        'tags' => 'nullable|array',
    ];

    public function mount()
    {
        $this->post = new Post;
        $this->postCategories = Category::all(['id', 'title']);
    }

    public function updatedPostTitle()
    {
        $this->validateOnly('post.title');
        $this->post->slug = Str::slug($this->post->title);
    }

    public function save()
    {
        $this->validate();
        $this->post->save();
        $this->post->categories()->sync($this->selectedCategories);
        $this->post->attachTags($this->tags, get_class($this->post));
        if ($this->photo) {
            $this->post->addMedia($this->photo)->toMediaCollection('cover');
        }
        $post = $this->post;
        $this->photo = null;
        $this->post = new Post;
        return $post;
    }

    public function saveAndShow()
    {
        $post = $this->save();
        return redirect()->route('admin.blog.posts.show', $post->id);
    }

    public function saveAndContinue()
    {
        $this->save();
        $this->dispatchBrowserEvent('success', ['message' => __('The post has been created successfully.')]);
    }
}
