<?php

namespace Modules\Aoe2Notebook\Enums;

use Modules\Core\Enums\BaseEnum;

final class ResourceEnums extends BaseEnum
{
    const FOOD = 'FOOD';
    const WOOD = 'WOOD';
    const STONE = 'STONE';
    const GOLD = 'GOLD';

    protected function defineLabels(): array
    {
        return [
            self::FOOD => 'Food',
            self::WOOD => 'Wood',
            self::STONE => 'Stone',
            self::GOLD => 'Gold',
        ];
    }
}