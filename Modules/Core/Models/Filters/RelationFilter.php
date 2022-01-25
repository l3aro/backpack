<?php

namespace Modules\Core\Models\Filters;

use Closure;

class RelationFilter extends BaseFilter
{
    protected $relation;

    public function __construct($relation, $field)
    {
        $this->relation = $relation;
        $this->filterOn($field);
    }

    public function handle($query, Closure $next)
    {
        $fieldName = "filter.{$this->relation}_{$this->field}";

        if (!$this->shouldFilter($fieldName)) {
            return $next($query);
        }

        $search = request()->input($fieldName);
        $action = is_array($search) ? 'whereIn' : 'where';
        $query->whereHas($this->relation, function ($query) use ($action, $search) {
            $query->{$action}($this->field, $search);
        });
    }
}
