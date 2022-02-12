<?php

namespace Modules\Blog\Http\Livewire\PostCategory;

use Livewire\Component;
use Modules\Blog\Models\PostCategory;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Illuminate\Support\Str;

class Create extends Component
{
    use LoadLayoutView;

    protected $viewPath = 'blog::livewire.post-category.create';
    public PostCategory $postCategory;

    protected $rules = [
        'postCategory.title' => 'required|string|max:255',
        'postCategory.description' => 'string',
        'postCategory.slug' => 'required|string|max:255',
        'postCategory.is_published' => '',
        'postCategory.meta_title' => '',
        'postCategory.meta_description' => '',
        'postCategory.meta_keyword' => '',
        'postCategory.priority' => '',
    ];

    public function mount()
    {
        $this->postCategory = new PostCategory;
    }

    public function updatedPostCategoryTitle()
    {
        $this->postCategory->slug = Str::slug($this->postCategory->title);
    }

    public function save()
    {
        $this->validate($this->rules);
        $maxPriority = PostCategory::max('priority') ?? 1;
        $this->postCategory->priority = $maxPriority + 1;
        $this->postCategory->save();
        $postCategory = $this->postCategory;
        $this->postCategory = new PostCategory;
        return $postCategory;
    }

    public function saveAndShow()
    {
        $postCategory = $this->save();
        return redirect()->route('admin.post-categories.show', $postCategory->id);
    }

    public function saveAndContinue()
    {
        $this->save();
        $this->dispatchBrowserEvent('success', ['message' => __('The category has been created successfully.')]);
    }
}
