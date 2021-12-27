<?php

namespace Modules\Core\Models\Filters;

use Closure;

abstract class BaseFilter
{
    protected string $ignore = '';

    protected string $field;

    abstract public function handle($query, Closure $next);

    public function filterOn(string $field): static
    {
        $this->field = $field;

        return $this;
    }

    public function ignore($key = ''): static
    {
        $this->ignore = $key;

        return $this;
    }

    public function shouldFilter(string $key): bool
    {
        if (!request()->has($key)) {
            return false;
        }

        if (isset($this->ignore) && $this->ignore === request()->input($key)) {
            return false;
        }

        return true;
    }
}
