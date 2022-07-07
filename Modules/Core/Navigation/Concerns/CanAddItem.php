<?php

namespace Modules\Core\Navigation\Concerns;

use Modules\Core\Navigation\Item;

trait CanAddItem
{
    public function add(callable $callback): static
    {
        $item = $callback(app(Item::class));
        $this->navigation[] = $item;

        return $this;
    }
}
