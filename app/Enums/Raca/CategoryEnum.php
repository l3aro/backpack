<?php

namespace App\Enums\Raca;

use App\Enums\BaseEnum;

final class CategoryEnum extends BaseEnum
{
    const OTHER = 1;
    const TESLA = 3;
    const DIAMOND_AVATAR = 4;
    const METAMON_AVATAR = 5;
    const POTION_AVATAR = 6;
    const MUSK_USM_LAND = 7;
    const METAMON_USM_LAND = 8;
    const SPACE_X_NAUT_DOG = 9;
    const MATRIX_PLUS_BOX = 10;
    const BAKE_MUSK_MIXER = 11;
    const DING = 12;
    const METAMON = 13;
    const EGG_AVATAR = 14;
    const POTION = 15;
    const DIAMOND = 16;
    const EGG = 17;
    const BMBMUSK = 18;
    const BMBRACA = 19;
    const KISS_UP_STATE_LAND = 20;
    const MYSTERY_BOX = 21;
    const SUPER_RARE_KISS_UP_DOG = 22;
    const R_METAMON = 23;
    const SR_METAMON = 24;
    const SSR_METAMON = 25;
    const DRAGON_FRUIT_DOG = 26;

    protected function defineLabels(): array
    {
        return [
            self::OTHER => 'Other',
            self::TESLA => 'Tesla',
            self::DIAMOND_AVATAR => 'Diamond Avatar',
            self::METAMON_AVATAR => 'Metamon Avatar',
            self::POTION_AVATAR => 'Potion Avatar',
            self::MUSK_USM_LAND => 'Musk USM Land',
            self::METAMON_USM_LAND => 'Metamon USM Land',
            self::SPACE_X_NAUT_DOG => 'Space X Naut Dog',
            self::MATRIX_PLUS_BOX => 'Matrix Plus Box',
            self::BAKE_MUSK_MIXER => 'Bake Musk Mixer',
            self::DING => 'Ding',
            self::METAMON => 'Metamon',
            self::EGG_AVATAR => 'Egg Avatar',
            self::POTION => 'Potion',
            self::DIAMOND => 'Diamond',
            self::EGG => 'Egg',
            self::BMBMUSK => 'BMB Musk',
            self::BMBRACA => 'BMB Raca',
            self::KISS_UP_STATE_LAND => 'Kiss Up State Land',
            self::MYSTERY_BOX => 'Mystery Box',
            self::SUPER_RARE_KISS_UP_DOG => 'Super Rare Kiss Up Dog',
            self::R_METAMON => 'R Metamon',
            self::SR_METAMON => 'SR Metamon',
            self::SSR_METAMON => 'SSR Metamon',
            self::DRAGON_FRUIT_DOG => 'Dragon Fruit Dog',
        ];
    }
}
