<?php

namespace Modules\Core\Services\Eloquent;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Modules\Core\Services\Contracts\AuthenticationService;

class AuthenticationServiceEloquent implements AuthenticationService
{
    protected $auth;

    public function __construct()
    {
        $this->setGuard(null);
        $this->setThrottleKey('admin|' . request()->ip());
    }

    public function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    protected function throttleKey()
    {
        return $this->throttleKey;
    }

    public function setThrottleKey(string $key): static
    {
        $this->throttleKey = $key;
        return $this;
    }

    public function authenticate(array $credentials, bool $remember = false): void
    {
        if (!$this->auth->attempt($credentials, $remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        $this->ensureAuthenticatedIsActive();

        RateLimiter::clear($this->throttleKey());
    }

    protected function ensureAuthenticatedIsActive(): void
    {
        if (!$this->auth->user()->isActive()) {
            $this->auth->logout();

            throw ValidationException::withMessages([
                'email' => __('auth.inactive'),
            ]);
        }
    }

    public function setGuard(?string $guard): static
    {
        $this->auth = Auth::guard($guard);
        return $this;
    }

    public function logout(): void
    {
        $this->auth->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();
    }
}
