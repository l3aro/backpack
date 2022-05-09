<?php

namespace Modules\Core\Enums;

trait DefineEnumLabel
{
    public static function labels(): array
    {
        return collect(self::cases())->mapWithKeys(function ($case) {
            return [$case->value => $case->label()];
        })->toArray();
    }

    public static function getLabel(string $key): string
    {
        return (new static)->label($key);
    }
}
