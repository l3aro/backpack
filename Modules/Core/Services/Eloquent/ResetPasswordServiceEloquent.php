<?php

namespace Modules\Core\Services\Eloquent;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\Auth\PasswordBroker;
use Modules\Core\Services\Contracts\ResetPasswordService;
use Password;

class ResetPasswordServiceEloquent implements ResetPasswordService
{
    protected PasswordBroker $broker;

    public function __construct()
    {
        $this->setBroker(Password::broker());
    }

    public function sendResetLink(string $email): string
    {
        return $this->broker()->sendResetLink([
            'email' => $email,
        ]);
    }

    public function attemptReset(array $credentials)
    {
        return $this->broker()->reset(
            $credentials,
            function ($user, $password) {
                $user->password = bcrypt($password);
                $user->save();
                event(new PasswordReset($user));
            }
        );
    }

    protected function broker(): PasswordBroker
    {
        return $this->broker;
    }

    public function setBroker(PasswordBroker $broker): static
    {
        $this->broker = $broker;

        return $this;
    }
}
