<?php

namespace Modules\Blog\Http\Livewire\PostCategory;

use Illuminate\Support\Str;
use Livewire\Component;
use Modules\Blog\Models\Category;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Modules\Core\Http\Livewire\Plugins\LoopFunctions;
use Modules\Core\Http\Livewire\Plugins\WatchLanguageChange;

class Edit extends Component
{
    use LoadLayoutView;
    use LoopFunctions;
    use WatchLanguageChange;

    protected $viewPath = 'blog::livewire.post-category.edit';

    public Category $postCategory;

    public $listeners = [
        'languageSwitched',
    ];

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'string',
            'slug' => 'required',
            'is_published' => '',
            'meta_title' => '',
            'meta_description' => '',
            'meta_keyword' => '',
            'priority' => '',
        ];
    }

    public function mount(Category $postCategory)
    {
        $this->postCategory = $postCategory;
        $this->fetchLocale();
        $this->resetState();
    }

    public function languageSwitched()
    {
        $this->fetchLocale();
        $this->resetState();
    }

    public function hydrate()
    {
        $this->applyLocale();
    }

    public function resetState()
    {
        $this->postCategory->refresh();
        $this->propertiesFrom($this->postCategory);
    }

    public function updatedTitle($value)
    {
        $this->validateOnly('title');
        $this->slug = Str::slug($value).'-'.now()->format('Ymd');
    }

    public function save()
    {
        $validated = $this->validate();
        $this->postCategory->fill($validated);
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
