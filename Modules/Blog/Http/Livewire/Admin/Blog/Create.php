<?php

namespace Modules\Blog\Http\Livewire\Admin\Blog;

use Livewire\Component;
use Modules\Blog\Models\Blog;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Modules\Blog\Models\BlogCategory;

class Create extends Component
{
    use LoadLayoutView;
    use WithFileUploads;

    protected $viewPath = 'blog::livewire.admin.blog.create';
    public Blog $blog;
    public $blogCategories;
    public $selectedBlogCategories = [];
    public $photo;
    public $tags = [];

    protected $rules = [
        'blog.title' => 'required|string|max:255',
        'blog.description' => 'string',
        'blog.content' => 'required|string',
        'blog.slug' => 'required|string|max:255',
        'blog.published_at' => 'nullable|date',
        'blog.meta_title' => '',
        'blog.meta_description' => '',
        'blog.meta_keyword' => '',
        'selectedBlogCategories' => 'required|array',
        'photo' => 'required|image',
        'tags' => 'nullable|array',
    ];

    public function mount()
    {
        $this->blog = new Blog;
        $this->blogCategories = BlogCategory::all(['id', 'title']);
    }

    public function updatedBlogTitle()
    {
        $this->validateOnly('blog.title');
        $this->blog->slug = Str::slug($this->blog->title);
    }

    public function save()
    {
        $this->validate($this->rules);
        $maxPriority = Blog::max('priority') ?? 1;
        $this->blog->priority = $maxPriority + 1;
        $this->blog->save();
        $this->blog->categories()->sync($this->selectedBlogCategories);
        $this->blog->attachTags($this->tags, get_class($this->blog));
        if ($this->photo) {
            $this->blog->addMedia($this->photo)->toMediaCollection('cover');
        }
        $blog = $this->blog;
        $this->photo = null;
        $this->blog = new Blog;
        return $blog;
    }

    public function saveAndShow()
    {
        $blog = $this->save();
        return redirect()->route('admin.blogs.show', $blog->id);
    }

    public function saveAndContinue()
    {
        $this->save();
        $this->dispatchBrowserEvent('success', ['message' => __('The blog has been created successfully.')]);
    }
}
