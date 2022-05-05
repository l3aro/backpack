<?php

namespace Modules\Aoe2Notebook\Enums;

use Modules\Core\Enums\DefineEnumLabel;
use Modules\Core\Enums\EnumHasLabel;

enum ResourceEnum: string implements EnumHasLabel
{
    use DefineEnumLabel;

    case FOOD = 'FOOD';
    case WOOD = 'WOOD';
    case STONE = 'STONE';
    case GOLD = 'GOLD';

    public function label(): string
    {
        return match ($this) {
            self::FOOD => 'Food',
            self::WOOD => 'Wood',
            self::STONE => 'Stone',
            self::GOLD => 'Gold',
        };
    }
}
