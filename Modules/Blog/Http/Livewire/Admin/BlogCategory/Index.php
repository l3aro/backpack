<?php

namespace Modules\Blog\Http\Livewire\Admin\BlogCategory;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Modules\Blog\Models\BlogCategory;
use Modules\Core\Http\Livewire\Plugins\CanDestroyRecord;
use Modules\Core\Http\Livewire\Plugins\HasDataTable;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;

/**
 * @property \Illuminate\Pagination\LengthAwarePaginator $blogCategories
 */
class Index extends Component
{
    use LoadLayoutView;
    use HasDataTable;
    use CanDestroyRecord;

    protected $viewPath = 'blog::livewire.admin.blog-category.index';

    public function reorder($reorderedIds)
    {
        DB::beginTransaction();
        try {
            foreach ($reorderedIds as $index => $id) {
                $oldIndex = $this->blogCategories[$index];
                if ($id['value'] === $oldIndex->id) {
                    continue;
                }
                $swapItem = BlogCategory::find($id['value']);
                $swapItem->update(['priority' => $oldIndex->priority]);
            }
            DB::commit();
            $this->forgetComputed('blogCategories');
            $this->dispatchBrowserEvent('reordered');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function getBlogCategoriesProperty()
    {
        return $this->queryBuilder()
            ->filter()
            ->withCount('blogs')
            ->paginate($this->perPage);
    }

    protected function getModel()
    {
        return BlogCategory::class;
    }
}
