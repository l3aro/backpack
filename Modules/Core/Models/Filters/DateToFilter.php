<?php

namespace Modules\Core\Models\Filters;

use Closure;

class DateToFilter extends BaseFilter
{
    public function __construct($field = 'created_at')
    {
        $this->filterOn($field);
    }

    public function handle($query, Closure $next)
    {
        $fieldName = "{$this->namespace}.{$this->field}_to";

        if ($this->shouldFilter($fieldName)) {
            $query->where($this->field, '<=', request()->input($fieldName));
        }

        return $next($query);
    }
}
