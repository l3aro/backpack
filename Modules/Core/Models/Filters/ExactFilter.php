<?php

namespace Modules\Core\Models\Filters;

use Closure;

class ExactFilter extends BaseFilter
{
    public function __construct($field)
    {
        $this->filterOn($field);
    }

    public function handle($query, Closure $next)
    {
        $fieldName = "{$this->namespace}.{$this->field}";

        if ($this->shouldFilter($fieldName)) {
            $query->where($this->field, request()->input($fieldName));
        }

        return $next($query);
    }
}
