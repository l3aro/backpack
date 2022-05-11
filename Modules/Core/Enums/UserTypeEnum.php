<?php

namespace Modules\Core\Enums;

use Modules\Core\Enums\Concerns\DefineEnumLabel;
use Modules\Core\Enums\Contracts\EnumHasLabel;

enum UserTypeEnum: int implements EnumHasLabel
{
    use DefineEnumLabel;

    case DEACTIVATED = 1;
    case USER = 2;
    case ADMIN = 4;

    public function label(): string
    {
        return match ($this) {
            self::DEACTIVATED => __('Deactivated'),
            self::USER => __('User'),
            self::ADMIN => __('Admin'),
        };
    }
}
