<?php

namespace Modules\Blog\Http\Livewire\Post;

use Livewire\Component;
use Modules\Blog\Models\Post;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Modules\Blog\Models\PostCategory;

class Edit extends Component
{
    use LoadLayoutView;
    use WithFileUploads;

    protected $viewPath = 'blog::livewire.post.edit';
    public Post $post;
    public $postCategories;
    public $selectedPostCategories = [];
    public $photo;
    public $tags;

    protected function rules()
    {
        return [
            'post.title' => 'required|string|max:255',
            'post.description' => 'string',
            'post.content' => 'required|string',
            'post.slug' => 'required|string|max:255|unique:blogs,slug,' . $this->post->id,
            'post.published_at' => 'nullable|date',
            'post.meta_title' => '',
            'post.meta_description' => '',
            'post.meta_keyword' => '',
            'photo' => 'nullable|image',
            'tags' => 'nullable|array',
        ];
    }

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->tags = $post->tags->pluck('name')->toArray();
        $this->postCategories = PostCategory::all(['id', 'title']);
        $this->selectedPostCategories = $this->post->categories->pluck('id')->toArray();
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
        $this->post->categories()->sync($this->selectedPostCategories);
        $this->post->syncTagsWithType($this->tags, get_class($this->post));
        if ($this->photo) {
            $this->post->addMedia($this->photo)->toMediaCollection('cover');
        }
        $this->photo = null;
        return $this->post;
    }

    public function saveAndShow()
    {
        $post = $this->save();
        return redirect()->route('admin.posts.show', $post->id);
    }

    public function saveAndContinue()
    {
        $this->save();
        $this->dispatchBrowserEvent('success', ['message' => __('The post has been updated successfully.')]);
    }
}
