<?php

namespace Modules\Aoe2Notebook\Enums;

use Modules\Core\Enums\BaseEnum;

class ExpansionEnums extends BaseEnum
{
    const THE_AGE_OF_KING = 'THE_AGE_OF_KING';
    const THE_CONQUERORS = 'THE_CONQUERORS';
    const THE_FORGOTTEN = 'THE_FORGOTTEN';
    const THE_AFRICAN_KINGDOMS = 'THE_AFRICAN_KINGDOMS';
    const RISE_OF_RAJAS = 'RISE_OF_RAJAS';
    const DEFINITIVE_EDITION = 'DEFINITIVE_EDITION';
    const LORDS_OF_THE_WEST = 'LORDS_OF_THE_WEST';
    const DAWN_OF_THE_DUKES = 'DAWN_OF_THE_DUKES';

    protected function defineLabels(): array
    {
        return [
            self::THE_AGE_OF_KING => 'The Age of Kings',
            self::THE_CONQUERORS => 'The Conquerors',
            self::THE_FORGOTTEN => 'The Forgotten',
            self::THE_AFRICAN_KINGDOMS => 'The African Kingdoms',
            self::RISE_OF_RAJAS => 'Rise of Rajas',
            self::DEFINITIVE_EDITION => 'Definitive Edition',
            self::LORDS_OF_THE_WEST => 'Lords of the West',
            self::DAWN_OF_THE_DUKES => 'Dawn of the Dukes',
        ];
    }
}
