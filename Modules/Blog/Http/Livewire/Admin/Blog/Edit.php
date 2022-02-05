<?php

namespace Modules\Blog\Http\Livewire\Admin\Blog;

use Livewire\Component;
use Modules\Blog\Models\Blog;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Modules\Blog\Models\BlogCategory;

class Edit extends Component
{
    use LoadLayoutView;
    use WithFileUploads;

    protected $viewPath = 'blog::livewire.admin.blog.edit';
    public Blog $blog;
    public $blogCategories;
    public $selectedBlogCategories = [];
    public $photo;

    protected function rules()
    {
        return [
            'blog.title' => 'required|string|max:255',
            'blog.description' => 'string',
            'blog.content' => 'required|string',
            'blog.slug' => 'required|string|max:255|unique:blogs,slug,' . $this->blog->id,
            'blog.published_at' => 'nullable|date',
            'blog.meta_title' => '',
            'blog.meta_description' => '',
            'blog.meta_keyword' => '',
            'photo' => 'nullable|image',
        ];
    }

    public function mount(Blog $blog)
    {
        $this->blog = $blog;
        $this->blogCategories = BlogCategory::all(['id', 'title']);
        $this->selectedBlogCategories = $this->blog->categories->pluck('id')->toArray();
    }

    public function updatedBlogTitle()
    {
        $this->validateOnly('blog.title');
        $this->blog->slug = Str::slug($this->blog->title);
    }

    public function save()
    {
        $this->validate();
        $this->blog->save();
        $this->blog->categories()->sync($this->selectedBlogCategories);
        if ($this->photo) {
            $this->blog->addMedia($this->photo)->toMediaCollection('cover');
        }
        $this->photo = null;
        return $this->blog;
    }

    public function saveAndShow()
    {
        $blog = $this->save();
        return redirect()->route('admin.blogs.show', $blog->id);
    }

    public function saveAndContinue()
    {
        $this->save();
        $this->dispatchBrowserEvent('success', ['message' => __('The blog has been updated successfully.')]);
    }
}
