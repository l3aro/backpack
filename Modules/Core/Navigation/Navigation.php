<?php

namespace Modules\Core\Navigation;

use Illuminate\Contracts\Support\Arrayable;
use Modules\Core\Navigation\Concerns\CanAddItem;

class Navigation implements Arrayable, Section
{
    use CanAddItem;

    /**
     * @var Item[] $navigation
     */
    private array $navigation;

    public function toArray()
    {
        return $this->navigation;
    }

    public static function make()
    {
        return new static;
    }
}
