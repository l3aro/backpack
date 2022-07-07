<?php

namespace Modules\Blog\Http\Livewire\PostCategory;

use Illuminate\Support\Str;
use Livewire\Component;
use Modules\Blog\Models\Category;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Modules\Core\Http\Livewire\Plugins\LoopFunctions;
use Modules\Core\Http\Livewire\Plugins\WatchLanguageChange;

class Create extends Component
{
    use LoadLayoutView;
    use LoopFunctions;
    use WatchLanguageChange;

    protected $viewPath = 'blog::livewire.post-category.create';

    public Category $postCategory;

    protected $listeners = ['languageSwitched'];

    protected $rules = [
        'title' => 'required|max:255',
        'description' => 'string',
        'slug' => 'required',
        'is_published' => '',
        'meta_title' => '',
        'meta_description' => '',
        'meta_keyword' => '',
    ];

    public function mount()
    {
        $this->fetchLocale();
        $this->resetState();
    }

    public function resetState()
    {
        $this->postCategory = new Category;
        $this->propertiesFrom($this->postCategory);
    }

    public function languageSwitched()
    {
        $this->fetchLocale();
    }

    public function hydrate()
    {
        $this->applyLocale();
    }

    public function updatedTitle($value)
    {
        $this->validateOnly('title');
        $this->slug = Str::slug($value).'-'.now()->format('Ymd');
    }

    public function save()
    {
        $validated = $this->validate($this->rules);
        $this->postCategory->fill($validated);
        $this->postCategory->save();
        $postCategory = $this->postCategory;
        $this->resetState();

        return $postCategory;
    }

    public function saveAndShow()
    {
        $postCategory = $this->save();

        return redirect()->route('admin.blog.categories.show', $postCategory->id);
    }

    public function saveAndContinue()
    {
        $this->save();
        $this->dispatchBrowserEvent('success', ['message' => __('The category has been created successfully.')]);
    }
}
