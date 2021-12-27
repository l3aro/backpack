<?php

namespace Modules\Core\Models\Filters;

use Closure;

class Sort
{
    public function handle($query, Closure $next)
    {
        $sorts = request()->input('sort', []);
        if (count($sorts)) {
            foreach ($sorts as $field => $direction) {
                $query->orderBy($field, $direction);
            }
        }

        return $next($query);
    }
}
