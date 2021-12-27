<?php

namespace Modules\Core\Http\Livewire\Admin\Auth;

use Livewire\Component;
use Modules\Core\Services\Contracts\AuthenticationService;

class Logout extends Component
{
    public function render()
    {
        return view('core::livewire.admin.auth.logout');
    }

    public function logout(AuthenticationService $authenticationService)
    {
        $authenticationService->setGuard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
