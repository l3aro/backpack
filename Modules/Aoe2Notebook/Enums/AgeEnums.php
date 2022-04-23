<?php

namespace Modules\Aoe2Notebook\Enums;

use Modules\Core\Enums\BaseEnum;

final class AgeEnums extends BaseEnum
{
    const DARK_AGE = 'DARK_AGE';
    const FEUDAL_AGE = 'FEUDAL_AGE';
    const CASTLE_AGE = 'CASTLE_AGE';
    const IMPERIAL_AGE = 'IMPERIAL_AGE';

    protected function defineLabels(): array
    {
        return [
            self::DARK_AGE => 'Dark Age',
            self::FEUDAL_AGE => 'Feudal Age',
            self::CASTLE_AGE => 'Castle Age',
            self::IMPERIAL_AGE => 'Imperial Age',
        ];
    }
}