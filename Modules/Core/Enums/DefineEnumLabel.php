<?php

namespace Modules\Core\Enums;

trait DefineEnumLabel
{
    public static function labels(): array
    {
        $result = [];
        foreach (self::cases() as $case) {
            $result[$case->value] = $case->label();
        }
        return $result;
    }

    public static function getLabel(string $key): string
    {
        return (new static)->label($key);
    }
}
