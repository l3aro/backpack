<?php

namespace Modules\Blog\Http\Livewire\Post;

use Livewire\Component;
use Modules\Blog\Models\Post;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use MichaelRubel\LoopFunctions\Traits\LoopFunctions;
use Modules\Blog\Http\Requests\EditPostRequest;
use Modules\Blog\Models\Category;

class Edit extends Component
{
    use LoadLayoutView;
    use WithFileUploads;
    use LoopFunctions;

    protected $viewPath = 'blog::livewire.post.edit';
    public Post $post;
    public $selectedPostCategories = [];
    public $photo;
    public $tags;

    protected function rules(): array
    {
        return EditPostRequest::baseRules($this->post);
    }

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->propertiesFrom($this->post);
        $this->tags = $post->tags->pluck('name')->toArray();
        $this->selectedPostCategories = $this->post->categories->pluck('id')->toArray();
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
        $this->post->categories()->sync($this->selectedPostCategories);
        $this->post->syncTagsWithType($this->tags, get_class($this->post));
        if ($this->photo) {
            $this->post->addMedia($this->photo)->toMediaCollection('cover');
        }
        $this->photo = null;
        return $this->post;
    }

    public function hydratePublishedAt($value)
    {
        $this->published_at = isEmptyOrNull($value) || is_string($value)
            ? $value
            : $value->format('Y-m-d H:i');
    }

    public function saveAndShow()
    {
        $post = $this->save();
        return redirect()->route('admin.blog.posts.show', $post->id);
    }

    public function saveAndContinue()
    {
        $this->save();
        $this->dispatchBrowserEvent('success', ['message' => __('The post has been updated successfully.')]);
    }

    public function getPostCategoriesProperty()
    {
        return Category::all(['id', 'title']);
    }
}
