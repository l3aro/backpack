<?php

namespace Modules\Core\Http\Livewire\Auth;

use Illuminate\Support\Str;
use Livewire\Component;
use Modules\Core\Enums\UserTypeEnum;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Modules\Core\Providers\RouteServiceProvider;
use Modules\Core\Services\Contracts\AuthenticationService;

/**
 * @property AuthenticationService $authenticationService
 * @property string $throttleKey
 */
class Login extends Component
{
    use LoadLayoutView;

    protected $viewPath = 'core::livewire.auth.login';

    protected $layoutPath = 'core::components.layout-guest';

    public $email;

    public $password;

    public $remember = false;

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

        $this->authenticationService
            ->setThrottleKey($this->throttleKey)
            ->authenticate($credentials, $this->remember, UserTypeEnum::ADMIN);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function getAuthenticationServiceProperty()
    {
        return app(AuthenticationService::class)
            ->setGuard('admin');
    }

    public function getThrottleKeyProperty()
    {
        return Str::lower($this->email).':'.request()->ip();
    }
}
