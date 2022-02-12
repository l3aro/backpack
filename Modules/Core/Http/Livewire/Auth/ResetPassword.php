<?php

namespace Modules\Core\Http\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Livewire\Component;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Modules\Core\Services\Contracts\ResetPasswordService;

class ResetPassword extends Component
{
    use LoadLayoutView;

    protected $viewPath = 'core::livewire.auth.reset-password';
    protected $layoutPath = 'core::components.layout-guest';
    public $email;
    public $password;
    public $password_confirmation;
    public $token;

    public function mount($token)
    {
        $this->token = $token;
    }

    public function resetPassword(ResetPasswordService $resetPasswordService)
    {
        $this->resetErrorBag();

        $this->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        $response = $resetPasswordService->attemptReset($this->only(['email', 'password', 'token']));

        if ($response == Password::PASSWORD_RESET) {
            session()->flash('success', trans($response));
            return redirect()->route('admin.login');
        }

        $this->addError('email', trans($response));
    }
}
