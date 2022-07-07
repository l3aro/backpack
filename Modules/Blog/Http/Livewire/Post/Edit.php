<?php

namespace Modules\Blog\Http\Livewire\Post;

use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Blog\Http\Requests\EditPostRequest;
use Modules\Blog\Models\Category;
use Modules\Blog\Models\Post;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Modules\Core\Http\Livewire\Plugins\LoopFunctions;
use Modules\Core\Http\Livewire\Plugins\WatchLanguageChange;

class Edit extends Component
{
    use LoadLayoutView;
    use WithFileUploads;
    use LoopFunctions;
    use WatchLanguageChange;

    protected $viewPath = 'blog::livewire.post.edit';

    public Post $post;

    public $selectedPostCategories = [];

    public $photo;

    public $tags;

    protected $listeners = ['languageSwitched'];

    protected function rules(): array
    {
        return EditPostRequest::baseRules($this->post);
    }

    public function languageSwitched()
    {
        $this->fetchLocale();
        $this->resetState();
    }

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->fetchLocale();
        $this->resetState();
    }

    public function resetState()
    {
        $this->post->refresh();
        $this->propertiesFrom($this->post);
        $this->tags = $this->post->tags->pluck('name')->toArray();
        $this->selectedPostCategories = $this->post->categories->pluck('id')->toArray();
    }

    public function hydrate()
    {
        $this->published_at = isEmptyOrNull($this->published_at) || is_string($this->published_at)
            ? $this->published_at
            : $this->published_at->format('Y-m-d H:i');
        $this->applyLocale();
    }

    public function updatedTitle($value)
    {
        $this->validateOnly('title');
        $this->slug = Str::slug($value).'-'.now()->format('Ymd');
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
