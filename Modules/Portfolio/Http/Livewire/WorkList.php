<?php

namespace Modules\Portfolio\Http\Livewire;

use Livewire\Component;
use Modules\Portfolio\Http\Livewire\Plugins\LoadWebLayout;

class WorkList extends Component
{
    use LoadWebLayout;

    protected string $viewPath = 'portfolio::livewire.work-list';
}
