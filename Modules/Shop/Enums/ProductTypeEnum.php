<?php

namespace Modules\Shop\Enums;

use Modules\Core\Enums\Concerns\DefineEnumLabel;
use Modules\Core\Enums\Contracts\EnumHasLabel;

enum ProductTypeEnum: string implements EnumHasLabel
{
    use DefineEnumLabel;

    case BASIC = 'BASIC';
    case VARIATION = 'VARIATION';
    case VARIABLE_PRODUCT = 'VARIABLE_PRODUCT';
    case DOWNLOADABLE = 'DOWNLOADABLE';

    public function label(): string
    {
        return match ($this) {
            self::BASIC => 'Basic',
            self::VARIATION => 'Variation',
            self::VARIABLE_PRODUCT => 'Variable Product',
            self::DOWNLOADABLE => 'Downloadable',
        };
    }
}
