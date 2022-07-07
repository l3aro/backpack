<?php

namespace Modules\Core\Http\Livewire\Auth;

use Livewire\Component;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Modules\Core\Services\Contracts\AuthenticationService;

class Logout extends Component
{
    use LoadLayoutView;

    protected $viewPath = 'core::livewire.auth.logout';

    protected $layoutPath = 'core::components.layout-guest';

    public function logout(AuthenticationService $authenticationService)
    {
        $authenticationService->setGuard('admin')->logout();

        return redirect()->route('admin.login');
    }
}
