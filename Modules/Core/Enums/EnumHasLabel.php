<?php

namespace Modules\Core\Enums;

interface EnumHasLabel
{
    public function label(): string;
    public static function getLabel(string $key): string;
}
