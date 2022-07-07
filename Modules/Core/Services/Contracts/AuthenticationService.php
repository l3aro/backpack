<?php

namespace Modules\Core\Services\Contracts;

use Modules\Core\Enums\UserTypeEnum;

interface AuthenticationService
{
    public function ensureIsNotRateLimited(): void;

    public function authenticate(
        array $credentials,
        bool $remember = false,
        UserTypeEnum|array $types = UserTypeEnum::USER
    ): void;

    public function setThrottleKey(string $throttleKey): static;

    public function setGuard(?string $guard): static;

    public function logout(): void;
}
