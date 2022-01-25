<?php

namespace Modules\Blog\Http\Livewire\Admin\BlogCategory;

use Livewire\Component;
use Modules\Blog\Models\BlogCategory;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Illuminate\Support\Str;

class Edit extends Component
{
    use LoadLayoutView;

    protected $viewPath = 'blog::livewire.admin.blog-category.edit';
    public BlogCategory $blogCategory;

    protected function rules()
    {
        return [
            'blogCategory.title' => 'required|string|max:255',
            'blogCategory.description' => 'string',
            'blogCategory.slug' => 'required|string|max:255|unique:blog_categories,slug,' . $this->blogCategory->id,
            'blogCategory.is_published' => '',
            'blogCategory.meta_title' => '',
            'blogCategory.meta_description' => '',
            'blogCategory.meta_keyword' => '',
            'blogCategory.priority' => '',
        ];
    }

    public function mount(BlogCategory $blogCategory)
    {
        $this->blogCategory = $blogCategory;
    }

    public function updatedBlogCategoryTitle()
    {
        $this->validateOnly('blogCategory.title');
        $this->blogCategory->slug = Str::slug($this->blogCategory->title);
    }

    public function save()
    {
        $this->validate();
        $this->blogCategory->save();
        return $this->blogCategory;
    }

    public function saveAndShow()
    {
        $blogCategory = $this->save();
        return redirect()->route('admin.blog-categories.show', $blogCategory->id);
    }

    public function saveAndContinue()
    {
        $this->save();
        $this->dispatchBrowserEvent('success', ['message' => __('The category has been updated successfully.')]);
    }
}
