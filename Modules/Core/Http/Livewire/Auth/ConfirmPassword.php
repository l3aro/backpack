<?php

namespace Modules\Core\Http\Livewire\Auth;

use Livewire\Component;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;

class ConfirmPassword extends Component
{
    use LoadLayoutView;

    protected $viewPath = 'core::livewire.auth.confirm-password';
    protected $layoutPath = 'core::components.layout-guest';
}
