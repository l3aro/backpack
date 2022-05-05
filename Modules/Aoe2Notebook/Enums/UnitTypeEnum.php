<?php

namespace Modules\Aoe2Notebook\Enums;

use Modules\Core\Enums\DefineEnumLabel;
use Modules\Core\Enums\EnumHasLabel;

enum UnitTypeEnum: string implements EnumHasLabel
{
    use DefineEnumLabel;

    case ANIMAL = 'ANIMAL';
    case ARCHER = 'ARCHER';
    case CAVALRY = 'CAVALRY';
    case CIVILIAN = 'CIVILIAN';
    case GUNPOWDER = 'GUNPOWDER';
    case INFANTRY = 'INFANTRY';
    case MONK = 'MONK';
    case SHIP = 'SHIP';
    case SIEGE = 'SIEGE';
    case SUICIDE = 'SUICIDE';

    public function label(): string
    {
        return match ($this) {
            self::ANIMAL => 'Animal',
            self::ARCHER => 'Archer',
            self::CAVALRY => 'Cavalry',
            self::CIVILIAN => 'Civilian',
            self::GUNPOWDER => 'Gunpowder',
            self::INFANTRY => 'Infantry',
            self::MONK => 'Monk',
            self::SHIP => 'Ship',
            self::SIEGE => 'Siege',
            self::SUICIDE => 'Suicide',
        };
    }
}
