<?php

namespace Modules\Core\Http\Livewire\Auth;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Password;
use Livewire\Component;
use Modules\Core\Http\Livewire\Plugins\LoadLayoutView;
use Modules\Core\Services\Contracts\ResetPasswordService;

class ForgotPassword extends Component
{
    use LoadLayoutView;

    protected $viewPath = 'core::livewire.auth.forgot-password';
    protected $layoutPath = 'core::components.layout-guest';
    public $email;

    public function sendResetLink(ResetPasswordService $resetPasswordService)
    {
        $this->resetErrorBag();

        $this->validate([
            'email' => 'required|email',
        ]);

        ResetPassword::createUrlUsing(function ($user, string $token) {
            return route('admin.password.reset', $token);
        });

        $response = $resetPasswordService->sendResetLink($this->email);

        if ($response == Password::RESET_LINK_SENT) {
            session()->flash('success', trans($response));
            return;
        }

        $this->addError('email', trans($response));
    }
}
