<?php

namespace Modules\Portfolio\Http\Livewire;

use Livewire\Component;
use Modules\Portfolio\Http\Livewire\Plugins\LoadWebLayout;

class Landing extends Component
{
    use LoadWebLayout;

    protected $viewPath = 'portfolio::livewire.landing';
}
