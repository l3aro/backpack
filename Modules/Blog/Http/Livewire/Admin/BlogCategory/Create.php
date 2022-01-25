<?php

namespace Modules\Blog\Http\Livewire\Admin\BlogCategory;

use Livewire\Component;
use Modules\Blog\Models\BlogCategory;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Illuminate\Support\Str;

class Create extends Component
{
    use LoadLayoutView;

    protected $viewPath = 'blog::livewire.admin.blog-category.create';
    public BlogCategory $blogCategory;

    protected $rules = [
        'blogCategory.title' => 'required|string|max:255',
        'blogCategory.description' => 'string',
        'blogCategory.slug' => 'required|string|max:255',
        'blogCategory.is_published' => '',
        'blogCategory.meta_title' => '',
        'blogCategory.meta_description' => '',
        'blogCategory.meta_keyword' => '',
        'blogCategory.priority' => '',
    ];

    public function mount()
    {
        $this->blogCategory = new BlogCategory;
    }

    public function updatedBlogCategoryTitle()
    {
        $this->blogCategory->slug = Str::slug($this->blogCategory->title);
    }

    public function save()
    {
        $this->validate($this->rules);
        $maxPriority = BlogCategory::max('priority') ?? 1;
        $this->blogCategory->priority = $maxPriority + 1;
        $this->blogCategory->save();
        $blogCategory = $this->blogCategory;
        $this->blogCategory = new BlogCategory;
        return $blogCategory;
    }

    public function saveAndShow()
    {
        $blogCategory = $this->save();
        return redirect()->route('admin.blog-categories.show', $blogCategory->id);
    }

    public function saveAndContinue()
    {
        $this->save();
        $this->dispatchBrowserEvent('success', ['message' => __('The category has been created successfully.')]);
    }
}
