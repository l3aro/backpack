<?php

namespace Modules\Core\Models\Filters;

use Closure;

class BitwiseFilter extends BaseFilter
{
    public function __construct($field)
    {
        $this->filterOn($field);
    }

    public function handle($query, Closure $next)
    {
        $filterName = "{$this->namespace}.{$this->field}";
        $search = request()->input($filterName);
        if (!$this->shouldFilter($filterName)) {
            return $next($query);
        }

        if (!is_array($search)) {
            $search = [$search];
        }

        logger()->debug("Filtering on {$filterName} with value ", [$search]);
        foreach ($search as $value) {
            if (!$value) continue;
            $query->where($this->field, '&', $value);
        }

        return $next($query);
    }
}
