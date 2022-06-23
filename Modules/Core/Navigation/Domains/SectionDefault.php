<?php

namespace Modules\Core\Navigation\Domains;

use Illuminate\Contracts\Support\Arrayable;
use Modules\Core\Navigation\Concerns\CanAddItem;
use Modules\Core\Navigation\Section;

class SectionDefault implements Section, Arrayable
{
    use CanAddItem;

    public function __construct(private array $navigation = [])
    {
    }

    public function toArray()
    {
        return $this->navigation;
    }
}
