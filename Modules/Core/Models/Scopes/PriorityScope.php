<?php

namespace Modules\Core\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class PriorityScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->orderBy($model->getOrderColumn(), 'desc');
    }
}
