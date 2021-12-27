<?php

namespace Modules\Core\Http\Livewire\Admin;

use Livewire\Component;
use Modules\Core\Http\Livewire\Plugins\LoadAdminView;

class Dashboard extends Component
{
    use LoadAdminView;

    public $viewPath = 'core::livewire.admin.dashboard';
}
