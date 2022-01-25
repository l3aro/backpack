<?php

namespace Modules\Core\Models\Filters;

use Closure;

class DateFromFilter extends BaseFilter
{
    public function __construct($field = 'created_at')
    {
        $this->filterOn($field);
    }

    public function handle($query, Closure $next)
    {
        $fieldName = "filter.{$this->field}_from";

        if ($this->shouldFilter($fieldName)) {
            $query->where($this->field, '>=', request()->input($fieldName));
        }

        return $next($query);
    }
}
