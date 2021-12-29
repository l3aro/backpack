<?php

namespace Modules\Core\Http\Livewire\Admin;

use Livewire\Component;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;

class Dashboard extends Component
{
    use LoadLayoutView;

    public $viewPath = 'core::livewire.admin.dashboard';
}
