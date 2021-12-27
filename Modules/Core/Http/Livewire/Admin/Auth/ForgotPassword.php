<?php

namespace Modules\Core\Http\Livewire\Admin\Auth;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Password;
use Livewire\Component;
use Modules\Core\Services\Contracts\ResetPasswordService;

class ForgotPassword extends Component
{
    public $email;

    public function render()
    {
        return view('core::livewire.admin.auth.forgot-password')
            ->layout('core::components.layout-admin-guest');
    }

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
