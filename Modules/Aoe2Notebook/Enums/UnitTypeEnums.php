<?php

namespace Modules\Aoe2Notebook\Enums;

use Modules\Core\Enums\BaseEnum;

class UnitTypeEnums extends BaseEnum
{
    const ANIMAL = 'ANIMAL';
    const ARCHER = 'ARCHER';
    const CAVALRY = 'CAVALRY';
    const CIVILIAN = 'CIVILIAN';
    const GUNPOWDER = 'GUNPOWDER';
    const INFANTRY = 'INFANTRY';
    const MONK = 'MONK';
    const SHIP = 'SHIP';
    const SIEGE = 'SIEGE';
    const SUICIDE = 'SUICIDE';

    protected function defineLabels(): array
    {
        return [
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
        ];
    }
}
