<?php

namespace Modules\Aoe2Notebook\Enums;

use Modules\Core\Enums\Concerns\DefineEnumLabel;
use Modules\Core\Enums\Contracts\EnumHasLabel;

enum ExpansionEnum: string implements EnumHasLabel
{
    use DefineEnumLabel;

    case THE_AGE_OF_KING = 'THE_AGE_OF_KING';
    case THE_CONQUERORS = 'THE_CONQUERORS';
    case THE_FORGOTTEN = 'THE_FORGOTTEN';
    case THE_AFRICAN_KINGDOMS = 'THE_AFRICAN_KINGDOMS';
    case RISE_OF_RAJAS = 'RISE_OF_RAJAS';
    case DEFINITIVE_EDITION = 'DEFINITIVE_EDITION';
    case LORDS_OF_THE_WEST = 'LORDS_OF_THE_WEST';
    case DAWN_OF_THE_DUKES = 'DAWN_OF_THE_DUKES';

    public function label(): string
    {
        return match ($this) {
            self::THE_AGE_OF_KING => 'The Age of Kings',
            self::THE_CONQUERORS => 'The Conquerors',
            self::THE_FORGOTTEN => 'The Forgotten',
            self::THE_AFRICAN_KINGDOMS => 'The African Kingdoms',
            self::RISE_OF_RAJAS => 'Rise of Rajas',
            self::DEFINITIVE_EDITION => 'Definitive Edition',
            self::LORDS_OF_THE_WEST => 'Lords of the West',
            self::DAWN_OF_THE_DUKES => 'Dawn of the Dukes',
        };
    }
}
