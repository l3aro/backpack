<?php

namespace Modules\Core\Services\Contracts;

interface AuthenticationService
{
    public function ensureIsNotRateLimited(): void;
    public function authenticate(array $credentials, bool $remember = false): void;
    public function setThrottleKey(string $throttleKey): static;
    public function setGuard(?string $guard): static;
    public function logout(): void;
}