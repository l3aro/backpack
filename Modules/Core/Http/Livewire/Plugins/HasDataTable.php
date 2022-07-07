<?php

namespace Modules\Core\Http\Livewire\Plugins;

use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

trait HasDataTable
{
    use WithPagination;

    public $perPage = 10;

    public $filter = [];

    public $sort = [];

    public $arrayFilters = [];

    public $perPageOptions = [10, 25, 50, 100];

    public function queryStringHasDataTable()
    {
        return [
            'filter' => ['except' => []],
            'sort' => ['except' => []],
        ];
    }

    public function mountHasDataTable()
    {
        $this->fill(request()->only('sort', 'filter'));
        $filter = request()->only('filter');

        if ($filter && isset($filter['filter'])) {
            foreach ($filter['filter'] as $key => $value) {
                if (array_key_exists($key, $this->arrayFilters)) {
                    $this->arrayFilters[$key] = $value;
                }
            }
        }
    }

    public function paginationView()
    {
        return 'core::pagination.full';
    }

    public function paginationSimpleView()
    {
        return 'core::pagination.simple';
    }

    public function updatingFilter()
    {
        $this->resetPage();
    }

    public function updatedFilter($value, $name)
    {
        if ($value === '') {
            unset($this->filter[$name]);
        }
    }

    public function updatingArrayFilters()
    {
        $this->resetPage();
    }

    public function updatedArrayFilters($value, $name)
    {
        $this->syncWithFilter($name, $value);
    }

    public function syncWithFilter($name, $value)
    {
        $this->filter[$name] = $value;
    }

    public function updatingSort()
    {
        $this->resetPage();
    }

    public function applySort($field)
    {
        $this->resetPage();
        if (! isset($this->sort[$field])) {
            $this->sort[$field] = 'desc';

            return;
        }
        if ($this->sort[$field] === 'desc') {
            $this->sort[$field] = 'asc';

            return;
        }
        unset($this->sort[$field]);
    }

    public function queryBuilder(...$subject): Builder
    {
        $request = request();
        $request->query->set('sort', $this->sort);
        $request->query->set('filter', $this->filter);
        if (empty($subject) && method_exists($this, 'getModel')) {
            return app($this->getModel())->query();
        }

        return $subject[0];
    }

    public function resetFilter()
    {
        $this->filter = [];
        $this->resetPage();
    }
}
