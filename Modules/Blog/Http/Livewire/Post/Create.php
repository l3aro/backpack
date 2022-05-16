<?php

namespace Modules\Blog\Http\Livewire\Post;

use Livewire\Component;
use Modules\Blog\Models\Post;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use MichaelRubel\LoopFunctions\Traits\LoopFunctions;
use Modules\Blog\Http\Requests\CreatePostRequest;
use Modules\Blog\Models\Category;

class Create extends Component
{
    use LoadLayoutView;
    use WithFileUploads;
    use LoopFunctions;

    protected $viewPath = 'blog::livewire.post.create';
    public Post $post;
    public $selectedCategories = [];
    public $photo;
    public $tags = [];

    protected function rules(): array
    {
        return CreatePostRequest::baseRules();
    }

    public function mount()
    {
        $this->resetState();
    }

    private function resetState()
    {
        $this->post = new Post;
        $this->propertiesFrom($this->post);
        $this->selectedCategories = [];
        $this->tags = [];
        $this->photo = null;
        $this->fill($this->post);
    }

    public function updatedTitle()
    {
        $this->validateOnly('title');
        $this->slug = Str::slug($this->title);
    }

    public function save()
    {
        $validated = $this->validate();
        $this->post->fill($validated);
        $this->post->save();
        $this->post->categories()->sync($this->selectedCategories);
        $this->post->attachTags($this->tags, get_class($this->post));
        if ($this->photo) {
            $this->post->addMedia($this->photo)->toMediaCollection('cover');
        }
        $post = $this->post;
        $this->resetState();
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

    public function getPostCategoriesProperty()
    {
        return Category::all(['id', 'title']);
    }
}
