<?php

namespace Modules\Core\Enums\Contracts;

interface EnumHasLabel
{
    public function label(): string;

    public static function getLabel(string $key): string;
}
