<?php

namespace Modules\Aoe2Notebook\Enums;

use Modules\Core\Enums\Concerns\DefineEnumLabel;
use Modules\Core\Enums\Concerns\EnumHasLabel;

enum AgeEnum: string implements EnumHasLabel
{
    use DefineEnumLabel;

    case DARK_AGE = 'DARK_AGE';
    case FEUDAL_AGE = 'FEUDAL_AGE';
    case CASTLE_AGE = 'CASTLE_AGE';
    case IMPERIAL_AGE = 'IMPERIAL_AGE';

    public function label(): string
    {
        return match ($this) {
            self::DARK_AGE => 'Dark Age',
            self::FEUDAL_AGE => 'Feudal Age',
            self::CASTLE_AGE => 'Castle Age',
            self::IMPERIAL_AGE => 'Imperial Age',
        };
    }
}
