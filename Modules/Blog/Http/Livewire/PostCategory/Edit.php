<?php

namespace Modules\Blog\Http\Livewire\PostCategory;

use Livewire\Component;
use Modules\Blog\Models\Category;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Illuminate\Support\Str;

class Edit extends Component
{
    use LoadLayoutView;

    protected $viewPath = 'blog::livewire.post-category.edit';
    public Category $postCategory;

    protected function rules()
    {
        return [
            'postCategory.title' => 'required|string|max:255',
            'postCategory.description' => 'string',
            'postCategory.slug' => 'required|string|max:255|unique:blog_categories,slug,' . $this->postCategory->id,
            'postCategory.is_published' => '',
            'postCategory.meta_title' => '',
            'postCategory.meta_description' => '',
            'postCategory.meta_keyword' => '',
            'postCategory.priority' => '',
        ];
    }

    public function mount(Category $postCategory)
    {
        $this->postCategory = $postCategory;
    }

    public function updatedPostCategoryTitle()
    {
        $this->validateOnly('postCategory.title');
        $this->postCategory->slug = Str::slug($this->postCategory->title);
    }

    public function save()
    {
        $this->validate();
        $this->postCategory->save();
        return $this->postCategory;
    }

    public function saveAndShow()
    {
        $postCategory = $this->save();
        return redirect()->route('admin.blog.categories.show', $postCategory->id);
    }

    public function saveAndContinue()
    {
        $this->save();
        $this->dispatchBrowserEvent('success', ['message' => __('The category has been updated successfully.')]);
    }
}
