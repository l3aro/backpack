<?php

namespace Modules\Core\Http\Livewire\Admin\Auth;

use Illuminate\Support\Str;
use Livewire\Component;
use Modules\Core\Providers\RouteServiceProvider;
use Modules\Core\Services\Contracts\AuthenticationService;

/**
 * @property AuthenticationService $authenticationService
 * @property string $throttleKey
 */
class Login extends Component
{
    public $email;
    public $password;
    public $remember = false;

    public function render()
    {
        return view('core::livewire.admin.auth.login')
            ->layout('core::components.layout-admin-guest');
    }

    public function login()
    {
        $this->authenticationService
            ->setThrottleKey($this->throttleKey)
            ->ensureIsNotRateLimited();

        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $this->only(['email', 'password']);
        $credentials = array_merge($credentials, ['is_admin' => true]);

        $this->authenticationService
            ->setThrottleKey($this->throttleKey)
            ->authenticate($credentials, $this->remember);

        return redirect()->intended(RouteServiceProvider::ADMIN_ROOT);
    }

    public function getAuthenticationServiceProperty()
    {
        return app(AuthenticationService::class)
            ->setGuard('admin');
    }

    public function getThrottleKeyProperty()
    {
        return Str::lower($this->email) . ':' . request()->ip();
    }
}
