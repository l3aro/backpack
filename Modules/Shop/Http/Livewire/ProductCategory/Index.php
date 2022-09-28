<?php

namespace Modules\Shop\Http\Livewire\ProductCategory;

use Livewire\Component;
use Modules\Core\Http\Livewire\Plugins\CanDestroyRecord;
use Modules\Core\Http\Livewire\Plugins\CanReorderRecord;
use Modules\Core\Http\Livewire\Plugins\HasDataTable;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Modules\Core\Http\Livewire\Plugins\WatchLanguageChange;
use Modules\Shop\Models\Category;

class Index extends Component
{
    use LoadLayoutView;
    use HasDataTable;
    use CanDestroyRecord;
    use CanReorderRecord;
    use WatchLanguageChange;

    protected $viewPath = 'shop::livewire.product-category.index';

    protected $recordListName = 'categories';

    protected $listeners = ['languageSwitched'];

    public function languageSwitched()
    {
        $this->applyLocale();
    }

    public function mount()
    {
        $this->fetchLocale();
    }

    public function viewData(): array
    {
        return [
            'productCategories' => $this->queryBuilder()
                ->filter()
                ->with('parent:id,title')
                ->paginate($this->perPage),
        ];
    }

    protected function getModel()
    {
        return Category::class;
    }

    protected function beforeDestroyRecord()
    {
        app($this->getModel())->find($this->confirmingId)->products()->detach();
    }
}
