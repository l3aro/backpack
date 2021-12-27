<?php

namespace Modules\Core\Models\Filters;

use Closure;

class ScopeFilter extends BaseFilter
{
    public function __construct($scopeName)
    {
        $this->filterOn($scopeName);
    }

    public function handle($query, Closure $next)
    {
        $filterName = 'filter.' . $this->field;

        if ($this->shouldFilter($filterName)) {
            $query->{$this->field}(request()->input($filterName));
        }

        return $next($query);
    }
}
