<?php

namespace Modules\Core\Enums;

final class UserTypeEnum extends BaseEnum
{
    const ADMIN = 1;
    const USER = 0;

    protected function defineLabels(): array
    {
        return [
            self::ADMIN => __('Admin'),
            self::USER => __('User'),
        ];
    }
}
