<?php

namespace Modules\Core\Services\Contracts;

interface ResetPasswordService
{
    public function sendResetLink(string $email): string;

    public function attemptReset(array $credentials);
}
